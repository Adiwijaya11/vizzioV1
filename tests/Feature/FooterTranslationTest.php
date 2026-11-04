<?php

namespace Tests\Feature;

use Tests\TestCase;

class FooterTranslationTest extends TestCase
{
    public function test_footer_contains_bilingual_translation_attributes(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Check bilingual headings
        $response->assertSee('data-lang-id', false);
        $response->assertSee('data-lang-en', false);

        // Check footer elements
        $response->assertSee('Perusahaan');
        $response->assertSee('Company');
        $response->assertSee('Layanan');
        $response->assertSee('Services');
        $response->assertSee('Kontak');
        $response->assertSee('Contact');

        // Check footer link to Event
        $response->assertSee('href="/events"', false);
        $response->assertSee('Event &amp; Workshop', false);
        $response->assertSee('Events &amp; Workshops', false);

        // Check contact details
        $response->assertSee('vizziocraft@gmail.com');
        $response->assertSee('https://www.instagram.com/vizziocraft/');
        $response->assertSee('Denpasar, Bali, Indonesia');

        // Check copyright & tagline
        $response->assertSee('Seluruh hak cipta dilindungi');
        $response->assertSee('All rights reserved');
        $response->assertSee('Bangun lebih baik. Tumbuh lebih cepat.');
        $response->assertSee('Build better. Grow faster.');
    }
}

