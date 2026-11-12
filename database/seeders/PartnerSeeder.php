<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name'        => 'Bank Mandiri',
                'slug'        => 'bank-mandiri',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg',
                'type'        => 'client',
                'website_url' => 'https://www.bankmandiri.co.id',
                'order'       => 1,
                'status'      => 'active',
            ],
            [
                'name'        => 'Telkom Indonesia',
                'slug'        => 'telkom-indonesia',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/id/c/c4/Telkom_Indonesia_2013.svg',
                'type'        => 'client',
                'website_url' => 'https://www.telkom.co.id',
                'order'       => 2,
                'status'      => 'active',
            ],
            [
                'name'        => 'Bank Central Asia (BCA)',
                'slug'        => 'bank-central-asia',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg',
                'type'        => 'client',
                'website_url' => 'https://www.bca.co.id',
                'order'       => 3,
                'status'      => 'active',
            ],
            [
                'name'        => 'PT Astra International',
                'slug'        => 'astra-international',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/b/b3/Astra_International_logo.svg',
                'type'        => 'client',
                'website_url' => 'https://www.astra.co.id',
                'order'       => 4,
                'status'      => 'active',
            ],
            [
                'name'        => 'PT Pelabuhan Indonesia (Pelindo)',
                'slug'        => 'pelindo',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/4/4b/Logo_Pelindo.svg',
                'type'        => 'client',
                'website_url' => 'https://www.pelindo.co.id',
                'order'       => 5,
                'status'      => 'active',
            ],
            [
                'name'        => 'Kimia Farma',
                'slug'        => 'kimia-farma',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/d/da/Logo_Kimia_Farma.svg',
                'type'        => 'client',
                'website_url' => 'https://www.kimiafarma.co.id',
                'order'       => 6,
                'status'      => 'active',
            ],
            [
                'name'        => 'PT Kereta Api Indonesia (KAI)',
                'slug'        => 'kereta-api-indonesia',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/5/56/Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg',
                'type'        => 'client',
                'website_url' => 'https://www.kai.id',
                'order'       => 7,
                'status'      => 'active',
            ],
            [
                'name'        => 'PT PLN (Persero)',
                'slug'        => 'pln-persero',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.svg',
                'type'        => 'client',
                'website_url' => 'https://web.pln.co.id',
                'order'       => 8,
                'status'      => 'active',
            ],
            [
                'name'        => 'Amazon Web Services (AWS)',
                'slug'        => 'amazon-web-services',
                'logo'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original-wordmark.svg',
                'type'        => 'partner',
                'website_url' => 'https://aws.amazon.com',
                'order'       => 9,
                'status'      => 'active',
            ],
            [
                'name'        => 'Google Cloud Platform',
                'slug'        => 'google-cloud-platform',
                'logo'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg',
                'type'        => 'partner',
                'website_url' => 'https://cloud.google.com',
                'order'       => 10,
                'status'      => 'active',
            ],
            [
                'name'        => 'Cloudflare',
                'slug'        => 'cloudflare',
                'logo'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cloudflare/cloudflare-original.svg',
                'type'        => 'partner',
                'website_url' => 'https://www.cloudflare.com',
                'order'       => 11,
                'status'      => 'active',
            ],
            [
                'name'        => 'Docker Inc',
                'slug'        => 'docker-inc',
                'logo'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg',
                'type'        => 'partner',
                'website_url' => 'https://www.docker.com',
                'order'       => 12,
                'status'      => 'active',
            ],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(
                ['slug' => $partner['slug']],
                $partner
            );
        }
    }
}

