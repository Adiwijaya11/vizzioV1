<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\VisitorLog;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitorTrackingTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_automatically_log_visitors(): void
    {
        $this->get('/');

        $this->assertDatabaseHas('visitor_logs', [
            'url' => '/',
        ]);

        $log = VisitorLog::where('url', '/')->first();
        $this->assertNotNull($log);
        $this->assertEquals(1, $log->visit_count);

        // Kunjungan kedua harus meng-increment visit_count
        $this->get('/');
        $log->refresh();
        $this->assertEquals(2, $log->visit_count);
    }

    public function test_admin_analytics_page_renders_with_real_data(): void
    {
        // Masukkan beberapa record log pengunjung riil
        VisitorLog::create([
            'ip_address'  => '192.168.1.10',
            'user_agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/128.0',
            'url'         => '/services',
            'referrer'    => 'https://www.google.com/search?q=vizziocraft',
            'visit_date'  => now()->toDateString(),
            'visit_count' => 5,
        ]);

        VisitorLog::create([
            'ip_address'  => '192.168.1.20',
            'user_agent'  => 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 Mobile/15E148 Safari/604.1',
            'url'         => '/about/company',
            'referrer'    => null,
            'visit_date'  => now()->toDateString(),
            'visit_count' => 3,
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'admin_user_id'   => 1,
            'admin_email'     => 'superadmin@vizziocraft.com',
            'admin_name'      => 'Super Admin VizzioCraft',
        ])->get('/admin/analytics');

        $response->assertStatus(200);
        $response->assertSee('Analitik Pengunjung Situs Web');
        $response->assertSee('analytics-traffic-chart');
        $response->assertSee('/services');
        $response->assertSee('/about/company');
        $response->assertSee('192.168.1.10');
        $response->assertSee('Google Search');
    }
}
