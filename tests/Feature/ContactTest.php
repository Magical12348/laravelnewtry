<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contact_page()
    {
        $response = $this->get(route('contact'));

        $response->assertOk();
    }

    public function test_contact_form_store()
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Test Name',
            'phone_number' => '1234567890',
        ]);

        $response->assertSessionHasNoErrors()
            ->assertSessionHas('status', 'Thank You For Contacting Our Team Will Reach You.');
    }

    public function test_contact_form_store_with_invalid_data()
    {

        $response = $this->post(route('contact.store'), [
            'name' => 'Test Name',
            'phone_number' => '123456789',
        ]);

        $response->assertSessionHasErrors('phone_number');
    }

    public function test_contact_form_store_with_invalid_data_2()
    {

        $response = $this->post(route('contact.store'), [
            'name' => '',
            'phone_number' => '1234567890',
        ]);

        $response->assertSessionHasErrors('name');
    }
}
