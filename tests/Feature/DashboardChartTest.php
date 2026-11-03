<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardChartTest extends TestCase
{
    use RefreshDatabase;
    public function test_super_admin_can_view_dashboard_with_modern_charts(): void
    {
        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'admin_user_id'   => 1,
            'admin_email'     => 'superadmin@vizziocraft.com',
            'admin_name'      => 'Super Admin VizzioCraft',
        ])->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('chart-traffic-main');
        $response->assertSee('chart-role-superadmin');
        $response->assertSee('Tren Kunjungan Website');
        $response->assertSee('Audit & Keamanan Sistem', false);
    }

    public function test_admin_can_view_dashboard_with_modern_charts(): void
    {
        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'admin',
            'admin_user_id'   => 2,
            'admin_email'     => 'admin@vizziocraft.com',
            'admin_name'      => 'Admin VizzioCraft',
        ])->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('chart-traffic-main');
        $response->assertSee('chart-role-admin');
        $response->assertSee('Tren Kunjungan Website');
        $response->assertSee('Pipeline Leads & Konversi', false);
    }
}
