<?php

namespace Tests\Feature;

use App\Video;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_view_detail_video()
    {
        $videos = factory(Video::class, 5)->create();
        $videos->each(function($video) {
            $result = $this->get("watch/$video->slug");

            $result->assertOk()
                ->assertSee($video->title)
                ->assertSee("https://www.youtube.com/embed/$video->embed_id")
                ->assertSee($video->content);
        });
    }

    /** @test */
    public function cannot_view_detail_video()
    {
        factory(Video::class)->create();
        $result = $this->get("watch/" . Str::random(rand(3, 10)));

        $result->assertStatus(404)
            ->assertSee("Page Not Found");
    }
}
