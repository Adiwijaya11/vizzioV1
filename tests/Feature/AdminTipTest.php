<?php

namespace Tests\Feature;

use App\Models\Tip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTipTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/admin/tips');
        $response->assertRedirect('/login');

        $response = $this->get('/admin/tips/create');
        $response->assertRedirect('/login');
    }

    public function test_superadmin_can_view_tips_index(): void
    {
        Tip::create([
            'title'      => 'Panduan Audit Keamanan Microservices',
            'slug'       => 'panduan-audit-keamanan-microservices',
            'category'   => 'security',
            'badge'      => 'AUDIT KEAMANAN',
            'summary'    => 'Standar pengujian kerentanan API dan gateway.',
            'steps'      => ['Step 1: Check token JWT', 'Step 2: Check CORS header'],
            'outcome'    => 'Zero CVE Vulnerability',
            'read_time'  => '5 Menit',
            'status'     => 'active',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->get('/admin/tips');

        $response->assertStatus(200);
        $response->assertSee('Katalog Tips & Playbook Rekayasa');
        $response->assertSee('Panduan Audit Keamanan Microservices');
    }

    public function test_superadmin_can_create_new_tip(): void
    {
        $postData = [
            'title'      => 'Checklist Hardening Server Linux Ubuntu',
            'category'   => 'security',
            'badge'      => 'HARDENING INFRA',
            'summary'    => 'Panduan menutup port tidak terpakai dan mengonfigurasi SSH key authentication.',
            'steps'      => "Matikan akses root via password di sshd_config\nPasang fail2ban untuk mendeteksi brute force\nAktifkan ufw firewall hanya izinkan port 80, 443, dan port SSH custom",
            'outcome'    => 'Akses server terproteksi penuh dari serangan bot',
            'read_time'  => '4 Menit Baca',
            'order'      => 10,
            'status'     => 'active',
        ];

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->post('/admin/tips', $postData);

        $response->assertRedirect('/admin/tips');
        $this->assertDatabaseHas('tips', [
            'title'    => 'Checklist Hardening Server Linux Ubuntu',
            'slug'     => 'checklist-hardening-server-linux-ubuntu',
            'category' => 'security',
        ]);

        // Check public page displays this tip
        $publicRes = $this->get('/tips');
        $publicRes->assertStatus(200);
        $publicRes->assertSee('Checklist Hardening Server Linux Ubuntu');
    }

    public function test_superadmin_can_update_tip(): void
    {
        $tip = Tip::create([
            'title'      => 'Old Playbook Title',
            'slug'       => 'old-playbook-title',
            'category'   => 'performance',
            'summary'    => 'Old summary',
            'steps'      => ['Step 1'],
            'status'     => 'active',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->put("/admin/tips/{$tip->id}", [
            'title'      => 'Updated Playbook Title',
            'category'   => 'performance',
            'badge'      => 'PERFORMA TERBARU',
            'summary'    => 'Updated summary description',
            'steps'      => "Updated step 1\nUpdated step 2",
            'outcome'    => 'Faster response',
            'read_time'  => '3 Menit',
            'status'     => 'active',
        ]);

        $response->assertRedirect('/admin/tips');
        $this->assertDatabaseHas('tips', [
            'id'    => $tip->id,
            'title' => 'Updated Playbook Title',
        ]);
    }

    public function test_superadmin_can_delete_tip(): void
    {
        $tip = Tip::create([
            'title'      => 'Playbook to Delete',
            'slug'       => 'playbook-to-delete',
            'category'   => 'product',
            'summary'    => 'Summary to delete',
            'steps'      => ['Step 1'],
            'status'     => 'inactive',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->delete("/admin/tips/{$tip->id}");

        $response->assertRedirect('/admin/tips');
        $this->assertDatabaseMissing('tips', [
            'id' => $tip->id,
        ]);
    }
}

