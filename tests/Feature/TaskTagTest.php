<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTagTest extends TestCase {
  use RefreshDatabase;

  public function test_tasks_tag_pivot() {
    $task = Task::factory()->create();
    $tag = Tag::factory()->create();

    $task->tags()->attach($tag);

    $pivot = $task->tags()->first()->pivot;

    $this->assertEquals($task->id, $pivot->task_id);
    $this->assertEquals($tag->id, $pivot->tag_id);

    $this->assertInstanceOf(Task::class, $pivot->task);
    $this->assertInstanceOf(Tag::class, $pivot->tag);
  }
}
