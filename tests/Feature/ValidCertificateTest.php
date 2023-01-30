<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidCertificateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_valid_certificate_page()
    {
        $response = $this->get(route('certificate.show'));

        $response->assertOk();
        $response->assertSee('Certification ID');
    }

    public function test_valid_certificate_page_with_valid_certificate()
    {
        $certificate = Certificate::factory()->create([
            'certificate_number' => Str::random(8)
        ]);

        $response = $this->post(route('certificate.validate'), [
            'certificate_number' => $certificate->certificate_number,
        ]);

        $response->assertOk();
        $response->assertViewHas('certificate');
        $this->assertEquals($certificate->certificate_number, $response['certificate']['certificate_number']);
    }

    public function test_valid_certificate_page_with_invalid_certificate()
    {
        $response = $this->post(route('certificate.validate'), [
            'certificate_number' => '1234567890',
        ]);

        $response->assertSessionHasErrors('certificate_number');
        $response->assertSessionHasErrors([
            'certificate_number' => 'The selected certificate number is invalid.'
        ]);
    }
}
