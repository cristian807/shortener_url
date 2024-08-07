<?php

namespace Tests\Feature;

use App\Models\Shortener;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShortenerTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_return_view_index_whit_shortener(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_save_shortener_url() : void {
        $url_origin= "http://example.short.url.origin.com";

        $response = $this->post(
            route('shortener.store'),
            ['origin_url' => $url_origin]
        );

        $response->assertStatus(302)->assertRedirect(route('shortener'));
        $response->assertSessionHas('message', 'URLs acortada exitosamente.');

    }


    public function test_destroy_shortener_url() : void {
        $shotener = Shortener::factory()->create();

        $response = $this->delete('/shortener/destroy/'.$shotener->id);

        $this->assertDatabaseMissing('shorteners', ['id' => $shotener->id]);

        $response->assertRedirect(route('shortener'));
        $response->assertSessionHas('message', 'Registro eliminado exitosamente.');
    }

    public function test_redirect_shortener_url() : void {
        $shotener = Shortener::factory()->create([
            'origin_url'=>'google.com'
        ]);

        $response = $this->get(route('shortener.redirect', $shotener->code_url));

        $response->assertRedirect($shotener->origin_url);
    }

    public function test_redirect_shortener_url_not_fount() : void {
        $response = $this->get(route('shortener.redirect', 'notCode'));

        $response->assertRedirect(route('shortener'));
        $response->assertSessionHas('message', 'No se encontró una URL acortada con el código proporcionado.');
    }
}
