<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HeroBackgroundModeTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_uses_blob_mode_by_default_when_no_image_set(): void
    {
        Storage::fake(config('filesystems.default'));

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="hero-blob"', false);
        $response->assertDontSee('id="hero-bg-image"', false);
    }

    public function test_superadmin_can_upload_hero_image_and_homepage_switches_to_image_mode(): void
    {
        Storage::fake(config('filesystems.default'));
        Storage::fake('public');

        $file = UploadedFile::fake()->image('hero-bg.jpg', 1920, 1080);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->post('/admin/settings/banner', [
            'badge'           => 'SOLUSI DIGITAL TERDEPAN',
            'title_id'        => 'Bergerak Memberi Solusi',
            'desc_id'         => 'Deskripsi hero test.',
            'cta_primary'     => 'Mulai Project',
            'cta_primary_url' => '/#contact',
            'cta_second'      => 'Jelajahi Layanan',
            'cta_second_url'  => '/services',
            'gradient_style'  => 'blue-cyan',
            'blob_active'     => '1',
            'search_bar'      => '1',
            'bg_image_file'   => $file,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $home = $this->get('/');
        $home->assertStatus(200);
        $home->assertSee('id="hero-bg-image"', false);
        $home->assertSee('/storage/hero/', false);
        $home->assertDontSee('id="hero-blob"', false);
    }

    public function test_superadmin_can_remove_hero_image_to_revert_to_blob_mode(): void
    {
        Storage::fake(config('filesystems.default'));
        Storage::fake('public');

        // First set an external image URL
        $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->post('/admin/settings/banner', [
            'badge'           => 'SOLUSI DIGITAL TERDEPAN',
            'title_id'        => 'Bergerak Memberi Solusi',
            'desc_id'         => 'Deskripsi hero test.',
            'cta_primary'     => 'Mulai Project',
            'cta_primary_url' => '/#contact',
            'cta_second'      => 'Jelajahi Layanan',
            'cta_second_url'  => '/services',
            'gradient_style'  => 'blue-cyan',
            'bg_image_url'    => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31',
        ]);

        $this->get('/')
            ->assertSee('id="hero-bg-image"', false)
            ->assertDontSee('id="hero-blob"', false);

        // Now remove the image
        $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->post('/admin/settings/banner', [
            'badge'           => 'SOLUSI DIGITAL TERDEPAN',
            'title_id'        => 'Bergerak Memberi Solusi',
            'desc_id'         => 'Deskripsi hero test.',
            'cta_primary'     => 'Mulai Project',
            'cta_primary_url' => '/#contact',
            'cta_second'      => 'Jelajahi Layanan',
            'cta_second_url'  => '/services',
            'gradient_style'  => 'blue-cyan',
            'remove_bg_image' => '1',
        ]);

        $this->get('/')
            ->assertSee('id="hero-blob"', false)
            ->assertDontSee('id="hero-bg-image"', false);
    }
}

