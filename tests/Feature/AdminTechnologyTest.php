<?php

namespace Tests\Feature;

use App\Models\Technology;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminTechnologyTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/admin/technologies');
        $response->assertRedirect('/login');

        $response = $this->get('/admin/technologies/create');
        $response->assertRedirect('/login');
    }

    public function test_superadmin_can_view_technology_index(): void
    {
        $tech = Technology::create([
            'name'               => 'RabbitMQ Cluster',
            'slug'               => 'rabbitmq-cluster',
            'category'           => 'backend',
            'category_label_id'  => 'Backend & Core API',
            'category_label_en'  => 'Backend & Core API',
            'version'            => 'v3.13',
            'role'               => 'Distributed AMQP Message Broker',
            'description'        => 'Broker pesan enterprise untuk desinkronisasi proses background.',
            'image'              => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/rabbitmq/rabbitmq-original.svg',
            'status'             => 'active',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->get('/admin/technologies');

        $response->assertStatus(200);
        $response->assertSee('Katalog Teknologi & Stack Rekayasa');
        $response->assertSee('RabbitMQ Cluster');
    }

    public function test_superadmin_can_create_new_technology(): void
    {
        $postData = [
            'name'               => 'Apache Kafka',
            'category'           => 'database',
            'version'            => 'v3.7 • KRaft',
            'role'               => 'Event Streaming Platform',
            'description'        => 'Platform event streaming terdistribusi untuk jutaan transaksi real-time.',
            'image_url'          => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apachekafka/apachekafka-original.svg',
            'features'           => "High-Throughput\nPartitioned Log\nZero Data Loss",
            'use_case'           => 'Event mesh transaksi keuangan dan audit telemetri',
            'performance_metric' => '100k+ Events/sec',
            'official_url'       => 'https://kafka.apache.org',
            'order'              => 5,
            'status'             => 'active',
            'is_featured'        => 1,
        ];

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->post('/admin/technologies', $postData);

        $response->assertRedirect('/admin/technologies');
        $this->assertDatabaseHas('technologies', [
            'name'     => 'Apache Kafka',
            'slug'     => 'apache-kafka',
            'category' => 'database',
        ]);

        // Verify public page /technology shows newly created stack
        $publicRes = $this->get('/technology');
        $publicRes->assertStatus(200);
        $publicRes->assertSee('Apache Kafka');
        $publicRes->assertSee('Event Streaming Platform');
    }

    public function test_superadmin_can_update_technology(): void
    {
        $tech = Technology::create([
            'name'               => 'Redis Standalone',
            'slug'               => 'redis-standalone',
            'category'           => 'database',
            'category_label_id'  => 'Database & Cache',
            'category_label_en'  => 'Database & Cache',
            'role'               => 'In-Memory Cache',
            'description'        => 'Cache memory untuk respon kilat.',
            'image'              => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original.svg',
            'status'             => 'active',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->put("/admin/technologies/{$tech->id}", [
            'name'               => 'Redis Cluster Enterprise',
            'category'           => 'database',
            'version'            => 'v7.2 Multi-AZ',
            'role'               => 'Distributed In-Memory Cluster & Pub/Sub',
            'description'        => 'Cluster Redis terdistribusi dengan failover otomatis.',
            'image_url'          => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original.svg',
            'features'           => 'Redlock, Streams, Cluster Sharding',
            'performance_metric' => 'Sub-millisecond latency',
            'status'             => 'active',
        ]);

        $response->assertRedirect('/admin/technologies');
        $this->assertDatabaseHas('technologies', [
            'id'   => $tech->id,
            'name' => 'Redis Cluster Enterprise',
            'role' => 'Distributed In-Memory Cluster & Pub/Sub',
        ]);
    }

    public function test_superadmin_can_delete_technology(): void
    {
        $tech = Technology::create([
            'name'               => 'Deprecated Stack',
            'slug'               => 'deprecated-stack',
            'category'           => 'backend',
            'category_label_id'  => 'Backend',
            'category_label_en'  => 'Backend',
            'role'               => 'Legacy API',
            'description'        => 'Stack lama yang akan dipensiunkan.',
            'image'              => 'https://example.com/logo.svg',
            'status'             => 'inactive',
        ]);

        $response = $this->withSession([
            'admin_logged_in' => true,
            'user_role'       => 'super_admin',
            'user_name'       => 'Super Admin',
        ])->delete("/admin/technologies/{$tech->id}");

        $response->assertRedirect('/admin/technologies');
        $this->assertDatabaseMissing('technologies', [
            'id' => $tech->id,
        ]);
    }
}

