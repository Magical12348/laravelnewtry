<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_page()
    {
        $response = $this->get(route('welcome'));

        $response->assertOk()
            ->assertSee('Magical Umbrella Private Limited')
            ->assertViewHas(['courses', 'due_dates']);
    }

    public function test_about_page()
    {
        $response = $this->get(route('about'));

        $response->assertOk();
        $response->assertSee('About Us');
    }

    public function test_faqs_page()
    {
        $response = $this->get(route('faqs'));

        $response->assertOk()
            ->assertSee('Faq')
            ->assertViewHas('faqs');
    }

    public function test_terms_page()
    {
        $response = $this->get(route('terms'));

        $response->assertOk()
            ->assertSee('terms')
            ->assertViewHas('terms');
    }

    public function test_career_page()
    {
        $response = $this->get(route('career.list'));

        $response->assertOk()
            ->assertSee('Careers');
    }

    public function test_career_term_page()
    {
        $response = $this->get(route('career.term'));

        $response->assertOk()
            ->assertSee('Job Profile');
    }

    // public function test_coding_kids_courses()
    // {

    //     $response = $this->get(route('summerCamp.index'));

    //     $response->assertOk()
    //         ->assertViewHas('courses');
    // }
}
