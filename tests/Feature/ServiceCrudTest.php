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

        // 2. Verify it appears on /services and /
        $this->get('/services')->assertSee('Cloud DevOps &amp; CI/CD Pipeline', false);
        $this->get('/')->assertSee('Cloud DevOps &amp; CI/CD Pipeline', false);

        // 3. Update the service
        $updateData = [
            'title'       => 'Cloud DevOps & Kubernetes Pro',
            'price'       => 'Mulai Rp 22.000.000',
            'category'    => 'DevOps & SRE',
            'description' => 'Solusi modernisasi infrastruktur cloud dan arsitektur microservices enterprise.',
            'badge'       => 'Pro',
            'features'    => "Multi-cluster Kubernetes\nPrometheus & Grafana Monitoring",
            'icon'        => 'server',
            'status'      => 'active',
        ];

        $response = $this->withSession(['admin_logged_in' => true, 'user_role' => 'super_admin', 'user_id' => 1])
            ->put(route('admin.services.update', $created->id), $updateData);

        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', [
            'id'    => $created->id,
            'title' => 'Cloud DevOps & Kubernetes Pro',
        ]);

        // 4. Verify updated title appears on public page
        $this->get('/services')->assertSee('Cloud DevOps &amp; Kubernetes Pro', false);

        // 5. Delete the service
        $response = $this->withSession(['admin_logged_in' => true, 'user_role' => 'super_admin', 'user_id' => 1])
            ->delete(route('admin.services.destroy', $created->id));

        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseMissing('services', [
            'id' => $created->id,
        ]);
    }
}
