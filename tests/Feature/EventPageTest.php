<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EventPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_events_index_page_is_accessible_and_renders_correctly(): void
    {
        Event::create([
            'title'       => 'Workshop Laravel Enterprise',
            'slug'        => 'workshop-laravel-enterprise',
            'excerpt'     => 'Workshop tingkat lanjut.',
            'description' => 'Deskripsi lengkap workshop laravel enterprise.',
            'type'        => 'workshop',
            'format'      => 'offline',
            'location'    => 'VizzioCraft HQ',
            'event_date'  => now()->addDays(5)->toDateString(),
            'start_time'  => '09:00',
            'price'       => 150000,
            'is_published'=> true,
        ]);

        $response = $this->get('/events');

        $response->assertStatus(200);
        $response->assertSee('Workshop Laravel Enterprise');
        $response->assertSee('Tipe Event');
        $response->assertSee('Format');
        $response->assertSee('Harga');
        $response->assertSee('Status');
        $response->assertSee('xl:grid-cols-3');
    }

    public function test_events_filtering_by_type(): void
    {
        Event::create([
            'title'       => 'Workshop Python AI',
            'slug'        => 'workshop-python-ai',
            'description' => 'Workshop AI.',
            'type'        => 'workshop',
            'event_date'  => now()->addDays(10)->toDateString(),
            'is_published'=> true,
        ]);

        Event::create([
            'title'       => 'Webinar Cloud Native',
            'slug'        => 'webinar-cloud-native',
            'description' => 'Webinar Cloud.',
            'type'        => 'webinar',
            'event_date'  => now()->addDays(12)->toDateString(),
            'is_published'=> true,
        ]);

        $response = $this->get('/events?type=workshop');

        $response->assertStatus(200);
        $response->assertSee('Workshop Python AI');
        $response->assertDontSee('Webinar Cloud Native');
    }

    public function test_event_detail_page_loads(): void
    {
        $event = Event::create([
            'title'       => 'Design Sprint Masterclass',
            'slug'        => 'design-sprint-masterclass',
            'description' => 'Belajar metode design sprint dalam 5 hari.',
            'type'        => 'workshop',
            'event_date'  => now()->addDays(20)->toDateString(),
            'is_published'=> true,
        ]);

        $response = $this->get('/events/' . $event->slug);

        $response->assertStatus(200);
        $response->assertSee('Design Sprint Masterclass');
        $response->assertSee('Belajar metode design sprint dalam 5 hari.');
    }

    public function test_legacy_news_category_event_redirects_to_events_page(): void
    {
        $response = $this->get('/news/category/event');

        $response->assertRedirect('/events');
    }

    public function test_navbar_contains_event_link(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('href="/events"', false);
    }

    public function test_admin_and_superadmin_can_access_event_management_and_create(): void
    {
        // 1. As Super Admin
        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->get('/admin/events');

        $response->assertStatus(200);
        $response->assertSee('Manajemen Event & Workshop', false);
        $response->assertSee('Tambah Event Baru', false);
        $response->assertSee('href="/admin/events"', false);

        // 2. As Admin
        $responseAdmin = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'admin',
            'user_name'       => 'Admin Regular',
        ])->get('/admin/events/create');

        $responseAdmin->assertStatus(200);
        $responseAdmin->assertSee('Tambah Event & Workshop Baru', false);
    }

    public function test_admin_can_store_and_update_event(): void
    {
        $postData = [
            'title'       => 'Kubernetes Production Hands-on',
            'type'        => 'workshop',
            'format'      => 'offline',
            'location'    => 'VizzioLab Surabaya',
            'event_date'  => now()->addDays(15)->format('Y-m-d'),
            'price'       => 200000,
            'status'      => 'upcoming',
            'description' => 'Mempelajari deployment multi-node Kubernetes cluster.',
            'capacity'    => 25,
        ];

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'admin',
            'user_name'       => 'Admin',
        ])->post('/admin/events', $postData);

        $response->assertRedirect('/admin/events');
        $this->assertDatabaseHas('events', [
            'title' => 'Kubernetes Production Hands-on',
            'type'  => 'workshop',
        ]);

        $createdEvent = Event::where('title', 'Kubernetes Production Hands-on')->first();

        // Test Update
        $updateResponse = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->put('/admin/events/' . $createdEvent->id, array_merge($postData, [
            'title' => 'Kubernetes Production Hands-on (Updated)',
        ]));

        $updateResponse->assertRedirect('/admin/events');
        $this->assertDatabaseHas('events', [
            'id'    => $createdEvent->id,
            'title' => 'Kubernetes Production Hands-on (Updated)',
        ]);
    }

    public function test_admin_can_upload_event_image(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('event_banner.jpg', 800, 600);

        $postData = [
            'title'       => 'Event dengan Upload Gambar',
            'type'        => 'webinar',
            'format'      => 'online',
            'event_date'  => now()->addDays(20)->format('Y-m-d'),
            'price'       => 0,
            'status'      => 'upcoming',
            'description' => 'Event testing upload gambar.',
            'image_file'  => $file,
        ];

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'admin',
            'user_name'       => 'Admin',
        ])->post('/admin/events', $postData);

        $response->assertRedirect('/admin/events');

        $event = Event::where('title', 'Event dengan Upload Gambar')->first();
        $this->assertNotNull($event);
        $this->assertStringStartsWith('/storage/events/', $event->image);
        Storage::disk('public')->assertExists(str_replace('/storage/', '', $event->image));
    }
}

