<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_services_page_displays_active_services(): void
    {
        Service::create([
            'title'       => 'Apps & Software Development',
            'slug'        => 'apps-software-development',
            'price'       => 'Mulai Rp 5.000.000',
            'category'    => 'Development',
            'description' => 'Pengembangan aplikasi web dan mobile.',
            'icon'        => 'code',
            'features'    => ['Web App', 'Mobile App'],
            'badge'       => '',
            'status'      => 'active',
        ]);

        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertSee('Apps &amp; Software Development', false);
        $response->assertSee('KATALOG LAYANAN & BIAYA', false);
    }

    public function test_home_page_displays_active_services(): void
    {
        Service::create([
            'title'       => 'Apps & Software Development',
            'slug'        => 'apps-software-development',
            'price'       => 'Mulai Rp 5.000.000',
            'category'    => 'Development',
            'description' => 'Pengembangan aplikasi web dan mobile.',
            'icon'        => 'code',
            'features'    => ['Web App', 'Mobile App'],
            'badge'       => '',
            'status'      => 'active',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Apps &amp; Software Development', false);
        $response->assertSee('Solusi Digital Terpadu untuk Bisnis Anda');
    }

    public function test_superadmin_can_create_update_and_delete_service(): void
    {
        $title = 'Cloud DevOps & CI/CD Pipeline';

        // 1. Create a service via POST as super_admin
        $postData = [
            'title'       => $title,
            'price'       => 'Mulai Rp 18.000.000',
            'category'    => 'DevOps',
            'description' => 'Automasi build, test, dan deployment berbasis GitHub Actions dan Kubernetes.',
            'content'     => 'Rincian arsitektur CI/CD lengkap berbasis Kubernetes enterprise.',
            'badge'       => 'Enterprise',
            'features'    => "Docker & Kubernetes Orchestration\nAutomated CI/CD Pipeline\nInfrastructure as Code (Terraform)",
            'icon'        => 'cloud',
            'status'      => 'active',
        ];

        $response = $this->withSession(['admin_logged_in' => true, 'user_role' => 'super_admin', 'user_id' => 1])
            ->post(route('admin.services.store'), $postData);

        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', [
            'title'    => $title,
            'category' => 'DevOps',
        ]);

        $created = Service::where('title', $title)->first();
        $this->assertNotNull($created);
        $this->assertEquals(
            ['Docker & Kubernetes Orchestration', 'Automated CI/CD Pipeline', 'Infrastructure as Code (Terraform)'],
            $created->features
        );
        $this->assertEquals('Rincian arsitektur CI/CD lengkap berbasis Kubernetes enterprise.', $created->content);

        // 2. Verify it appears on /services and /
        $this->get('/services')->assertSee('Cloud DevOps &amp; CI/CD Pipeline', false);
        $this->get('/')->assertSee('Cloud DevOps &amp; CI/CD Pipeline', false);
        $this->get('/services/' . $created->slug)->assertSee('Rincian arsitektur CI/CD lengkap berbasis Kubernetes enterprise.');

        // 3. Update the service
        $updateData = [
            'title'       => 'Cloud DevOps & Kubernetes Pro',
            'price'       => 'Mulai Rp 22.000.000',
            'category'    => 'DevOps & SRE',
            'description' => 'Solusi modernisasi infrastruktur cloud dan arsitektur microservices enterprise.',
            'content'     => 'Konten yang sudah diperbarui dengan arsitektur multi-cloud.',
            'badge'       => 'Pro',
            'features'    => "Multi-cluster Kubernetes\nPrometheus & Grafana Monitoring",
            'icon'        => 'server',
            'status'      => 'active',
        ];

        $response = $this->withSession(['admin_logged_in' => true, 'user_role' => 'super_admin', 'user_id' => 1])
            ->put(route('admin.services.update', $created->id), $updateData);

        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', [
            'id'      => $created->id,
            'title'   => 'Cloud DevOps & Kubernetes Pro',
            'content' => 'Konten yang sudah diperbarui dengan arsitektur multi-cloud.',
        ]);

        // 4. Verify updated title appears on public page
        $this->get('/services')->assertSee('Cloud DevOps &amp; Kubernetes Pro', false);
        $created->refresh(); // slug may have changed after title update
        $this->get('/services/' . $created->slug)->assertSee('Konten yang sudah diperbarui dengan arsitektur multi-cloud.');

        // 5. Delete the service
        $response = $this->withSession(['admin_logged_in' => true, 'user_role' => 'super_admin', 'user_id' => 1])
            ->delete(route('admin.services.destroy', $created->id));

        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseMissing('services', [
            'id' => $created->id,
        ]);
    }

    public function test_service_show_page_displays_lms_details(): void
    {
        $lms = Service::create([
            'title'       => 'LMS Development',
            'slug'        => 'lms-development',
            'price'       => 'Mulai Rp 15.000.000',
            'category'    => 'EdTech',
            'description' => 'Platform E-Learning & Manajemen Kursus Kustom.',
            'icon'        => 'academic',
            'features'    => ['Multi-Role User', 'Quiz & Exam Engine', 'Auto-Certificate'],
            'badge'       => 'Popular',
            'status'      => 'active',
        ]);

        $response = $this->get('/services/lms-development');

        $response->assertStatus(200);
        $response->assertSee('LMS Development');
        $response->assertSee('Platform E-Learning');
        $response->assertSee('Multi-Role RBAC Portal');
        $response->assertSee('Curriculum Builder');
        $response->assertSee('Auto-Generate Certificate');
    }

    public function test_service_show_returns_404_for_unknown_slug(): void
    {
        $response = $this->get('/services/non-existent-slug');

        $response->assertStatus(404);
    }
}
