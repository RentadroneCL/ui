<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UploadMediaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * testing file uploads.
     *
     * @return void
     */
    public function testUploadMedia()
    {
        $project = factory(\App\Project::class)->create();

        $file = UploadedFile::fake()->image('DJI.jpg');

        $response = $this->postJson(route('media.upload', $project), ['files' => [$file]]);

        $response->assertStatus(200, $response->getStatusCode());
    }
}
