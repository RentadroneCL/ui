<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * feature test index page.
     *
     * @return void
     */
    public function testProjectIndex()
    {
        $response = $this->get(route('project.index'));

        $response->assertViewIs('project.index');

        $response->assertViewHas('projects');

        $response->assertStatus(200, $response->getStatusCode());
    }

    /**
     * feature test edit page.
     *
     * @return void
     */
    public function testProjectCreate()
    {
        $response = $this->get(route('project.create'));

        $response->assertViewIs('project.create');

        $response->assertStatus(200, $response->getStatusCode());
    }

    /**
     * feature test edit page.
     *
     * @return void
     */
    public function testProjectEdit()
    {
        $project = factory(Project::class)->create();

        $response = $this->get(route('project.edit', $project));

        $response->assertViewIs('project.edit');

        $response->assertViewHas('project');

        $response->assertStatus(200, $response->getStatusCode());
    }

    /**
     * feature test destroy project.
     *
     * @return void
     */
    public function testProjectDestroy()
    {
        $project = factory(Project::class)->create();

        $response = $this->delete(route('project.destroy', $project));

        $response->assertStatus(200, $response->getStatusCode());
    }
}
