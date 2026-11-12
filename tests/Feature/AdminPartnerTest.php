<?php

namespace Tests\Feature;

use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPartnerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/admin/partners');
        $response->assertRedirect('/login');

        $response = $this->get('/admin/partners/create');
        $response->assertRedirect('/login');
    }

    public function test_superadmin_can_view_partner_index(): void
    {
        Partner::create([
            'name'        => 'PT Indonesia Comnets Plus',
            'slug'        => 'pt-indonesia-comnets-plus',
            'logo'        => 'https://example.com/iconplus.svg',
            'type'        => 'client',
            'website_url' => 'https://plniconplus.co.id',
            'status'      => 'active',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->get('/admin/partners');

        $response->assertStatus(200);
        $response->assertSee('Katalog Partner & Klien');
        $response->assertSee('PT Indonesia Comnets Plus');
    }

    public function test_superadmin_can_create_new_partner(): void
    {
        $postData = [
            'name'        => 'Shopee Indonesia',
            'type'        => 'client',
            'logo_url'    => 'https://example.com/shopee.svg',
            'website_url' => 'https://shopee.co.id',
            'order'       => 1,
            'status'      => 'active',
        ];

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->post('/admin/partners', $postData);

        $response->assertRedirect('/admin/partners');
        $this->assertDatabaseHas('partners', [
            'name' => 'Shopee Indonesia',
            'slug' => 'shopee-indonesia',
            'type' => 'client',
        ]);

        // Check public page displays this partner
        $publicRes = $this->get('/industries');
        $publicRes->assertStatus(200);
        $publicRes->assertSee('Shopee Indonesia');
    }

    public function test_superadmin_can_update_partner(): void
    {
        $partner = Partner::create([
            'name'        => 'Tokopedia',
            'slug'        => 'tokopedia',
            'logo'        => 'https://example.com/tokopedia.svg',
            'type'        => 'client',
            'status'      => 'active',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->put("/admin/partners/{$partner->id}", [
            'name'        => 'GoTo Gojek Tokopedia',
            'type'        => 'partner',
            'logo_url'    => 'https://example.com/goto.svg',
            'website_url' => 'https://gotocompany.com',
            'status'      => 'active',
        ]);

        $response->assertRedirect('/admin/partners');
        $this->assertDatabaseHas('partners', [
            'id'   => $partner->id,
            'name' => 'GoTo Gojek Tokopedia',
            'type' => 'partner',
        ]);
    }

    public function test_superadmin_can_delete_partner(): void
    {
        $partner = Partner::create([
            'name'        => 'Sample Partner to Delete',
            'slug'        => 'sample-partner-to-delete',
            'logo'        => 'https://example.com/sample.svg',
            'type'        => 'client',
            'status'      => 'inactive',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->delete("/admin/partners/{$partner->id}");

        $response->assertRedirect('/admin/partners');
        $this->assertDatabaseMissing('partners', [
            'id' => $partner->id,
        ]);
    }
}

