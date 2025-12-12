<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_page_is_visible()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function test_admin_can_create_news_with_date()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/news', [
            'title' => 'Test Nieuws',
            'content' => 'Dit is een test bericht',
            'published_at' => '2025-01-01',
        ]);

        $response->assertRedirect('/news');
        $this->assertDatabaseHas('news', [
            'title' => 'Test Nieuws',
            'published_at' => '2025-01-01 00:00:00',
        ]);
    }

    public function test_public_can_see_news_date()
    {
        $news = News::create([
            'title' => 'Gepubliceerd Bericht',
            'content' => 'Content',
            'published_at' => '2025-05-20',
        ]);

        $response = $this->get('/news');
        $response->assertSee('20-05-2025');
        $response->assertSee('Gepubliceerd Bericht');
    }

    public function test_non_admin_cannot_create_news()
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->post('/admin/news', [
            'title' => 'Hacker Nieuws',
            'content' => 'Mag niet',
            'published_at' => '2025-01-01',
        ]);

        $response->assertStatus(403); // Or 404/500 depending on middleware check, usually 403 or 404 if route wrong
    }
}
