<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AdminAuthSecurityTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Config::set('admin.super_admin', [
            'name' => 'Super Admin Test',
            'email' => 'superadmin@vizziocraft.com',
            'password' => 'StrongSuper#2026',
        ]);

        Config::set('admin.admin', [
            'name' => 'Admin Test',
            'email' => 'admin@vizziocraft.com',
            'password' => 'StrongAdmin#2026',
        ]);
    }

    public function test_login_page_does_not_expose_demo_accounts(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertDontSee('superadmin123');
        $response->assertDontSee('admin123');
        $response->assertDontSee('fillAccount');
        $response->assertDontSee('Pilih Akses Role Admin');
    }

    public function test_unauthenticated_users_cannot_access_admin_panel(): void
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
        $this->get('/admin/users')->assertRedirect('/login');
    }

    public function test_regular_admin_cannot_access_super_admin_routes(): void
    {
        $this->withSession([
            'admin_logged_in' => true,
            'user_role' => 'admin',
            'user_name' => 'Admin Test',
        ])->get('/admin/users')->assertRedirect('/admin/dashboard');
    }

    public function test_env_superadmin_and_admin_can_login_and_regenerate_session(): void
    {
        $oldToken = session()->token();

        $resSuper = $this->post('/login', [
            'email' => 'superadmin@vizziocraft.com',
            'password' => 'StrongSuper#2026',
        ]);

        $resSuper->assertRedirect('/admin/dashboard');
        $this->assertEquals('super_admin', session('user_role'));
        $this->assertTrue(session('admin_logged_in'));
        $this->assertNotEquals($oldToken, session()->token());

        $this->post('/logout')->assertRedirect('/login');
        $this->assertNull(session('admin_logged_in'));

        $resAdmin = $this->post('/login', [
            'email' => 'admin@vizziocraft.com',
            'password' => 'StrongAdmin#2026',
        ]);

        $resAdmin->assertRedirect('/admin/dashboard');
        $this->assertEquals('admin', session('user_role'));
    }

    public function test_sql_injection_payload_is_rejected(): void
    {
        $response = $this->post('/login', [
            'email' => "' OR '1'='1",
            'password' => "' OR '1'='1",
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertNull(session('admin_logged_in'));
    }

    public function test_rate_limiter_blocks_brute_force_after_five_failed_attempts(): void
    {
        RateLimiter::clear('admin-login:admin@vizziocraft.com|127.0.0.1');

        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', [
                'email' => 'admin@vizziocraft.com',
                'password' => 'WrongPassword123',
            ])->assertSessionHas('error');
        }

        $lockedResponse = $this->post('/login', [
            'email' => 'admin@vizziocraft.com',
            'password' => 'StrongAdmin#2026',
        ]);

        $lockedResponse->assertSessionHas('error');
        $this->assertStringContainsString('Terlalu banyak percobaan login', session('error'));
        $this->assertNull(session('admin_logged_in'));
    }
}

