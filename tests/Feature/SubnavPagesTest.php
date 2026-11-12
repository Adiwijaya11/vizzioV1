<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubnavPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_subnav_contains_dedicated_page_links_instead_of_news_categories(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('href="/about/company"', false);
        $response->assertSee('href="/projects"', false);
        $response->assertSee('href="/events"', false);
        $response->assertSee('href="/technology"', false);
        $response->assertSee('href="/tips"', false);
        $response->assertSee('href="/industries"', false);
        $response->assertDontSee('href="/news/category/', false);
    }

    public function test_each_subnav_page_renders_distinct_content(): void
    {
        $this->get('/about/company')
            ->assertStatus(200)
            ->assertSee('Membangun Solusi Digital yang Berdampak Nyata', false);

        $this->get('/projects')
            ->assertStatus(200)
            ->assertSee('PORTOFOLIO & STUDI KASUS REKAYASA', false)
            ->assertSee('Enterprise Resource Planning (ERP)', false);

        $this->get('/technology')
            ->assertStatus(200)
            ->assertSee('TECH STACK & ARSITEKTUR REKAYASA', false)
            ->assertSee('Laravel 11', false)
            ->assertSee('PHP 8.3+', false);

        $this->get('/tips')
            ->assertStatus(200)
            ->assertSee('PLAYBOOK REKAYASA & PANDUAN PRAKTIS', false)
            ->assertSee('Checklist Optimasi Kecepatan Web', false);

        $this->get('/industries')
            ->assertStatus(200)
            ->assertSee('PARTNER & KLIEN STRATEGIS', false)
            ->assertSee('Bank Mandiri', false);
    }

    public function test_legacy_news_category_urls_redirect_to_dedicated_pages(): void
    {
        $this->get('/news/category/perusahaan')->assertRedirect('/about/company');
        $this->get('/news/category/proyek')->assertRedirect('/projects');
        $this->get('/news/category/event')->assertRedirect('/events');
        $this->get('/news/category/teknologi')->assertRedirect('/technology');
        $this->get('/news/category/tips')->assertRedirect('/tips');
        $this->get('/news/category/industri')->assertRedirect('/industries');
    }
}
