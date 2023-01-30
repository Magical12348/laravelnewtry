<?php

namespace Tests\Feature;

use App\Models\ServiceForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceFormTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_services_page()
    {
        $response = $this->get(route('services'));

        $response->assertOk();
    }

    public function test_services_form_store()
    {
        $response = $this->post(route('service.form.store'), [
            'name' => 'Test Name',
            'email' => 'test@test.com',
            'phone_number' => '1234567890',
            'description' => 'Test Message',
        ]);

        $response->assertSessionHasNoErrors()
            ->assertSessionHas('status', 'Your request has been submitted. We will get back to you shortly.');
    }

    public function test_services_form_store_invalid_data()
    {
        $response = $this->post(route('service.form.store'), [
            'name' => 'Test Name',
            'email' => 'testtest.com',
            'phone_number' => '12345678',
            'description' => 'Test Message',
        ]);

        $response->assertSessionHasErrors(['email', 'phone_number']);
    }

    public function test_show_lists_of_services_in_admin_panel_acting_as_admin_user()
    {
        // $service = ServiceForm::factory()->create();
        $user = User::factory()->create([
            'is_admin' => true
        ]);

        $response = $this->actingAs($user)
            ->get(route('admin.service.index'));

        $response->assertOk()
            ->assertSee('Service Details');
    }

    public function test_show_single_service_in_admin_panel_acting_as_admin_user()
    {
        $service = ServiceForm::factory()->create();
        $user = User::factory()->create([
            'is_admin' => true
        ]);

        $response = $this->actingAs($user)
            ->get(route('admin.service.show', $service->id));

        $response->assertOk()
            ->assertSee($service->name);
    }
}
