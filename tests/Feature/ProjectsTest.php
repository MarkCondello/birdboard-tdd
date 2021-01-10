<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_a_user_can_create_a_project()
    {

        $this->withoutExceptionHandling();

        $attrs = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attrs)->assertRedirect('/projects');
        // $this->assertDatabaseHas('projects', $attrs);

        // $this->get('/projects')->assertSee($attrs['title']);
    }

    public function test_a_project_requires_a_title(){
        $attrs = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects', $attrs)->assertSessionHasErrors('title');
    }

    public function test_a_project_requires_a_desc(){
        $attrs = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects', $attrs)->assertSessionHasErrors('description');
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
