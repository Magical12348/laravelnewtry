<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KidContactTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_kids_contact_form()
    {
        $response = $this->post(route('kid.contact.store'), [
            'name' => 'Test Name',
            'mobile_number' => '1234567890',
        ]);

        $response->assertSessionHasNoErrors()
            ->assertSessionHas('status', 'Thank You For Contacting Our Team Will Reach You.');
    }

    public function test_kids_contact_form_with_invalid_data_where_number_is_invalid()
    {

        $response = $this->post(route('kid.contact.store'), [
            'name' => 'Test Name',
            'mobile_number' => '123456789',
        ]);

        $response->assertSessionHasErrors('mobile_number');
    }

    public function test_kids_contact_form_with_invalid_data_where_name_is_not_filled()
    {

        $response = $this->post(route('kid.contact.store'), [
            'name' => '',
            'mobile_number' => '1234567890',
        ]);

        $response->assertSessionHasErrors('name');
    }
}
