<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_a_book_can_be_added_to_the_library()
    {
        $response = $this->post('/books', [
            'title' => 'Book 1',
            'author' => 'Author 1'
        ]);

        $response->assertOk();

        $response->assertCount(1, Book::all());
    }

}
