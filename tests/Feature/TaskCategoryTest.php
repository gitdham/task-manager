<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskCategoryTest extends TestCase {
  use RefreshDatabase;

  public function test_tasks_category_pivot() {
    $task = Task::factory()->create();
    $category = Category::factory()->create();

    $task->categories()->attach($category);

    $pivot = $task->categories->first()->pivot;

    $this->assertEquals($task->id, $pivot->task_id);
    $this->assertEquals($category->id, $pivot->category_id);

    $this->assertInstanceOf(Task::class, $pivot->task);
    $this->assertInstanceOf(Category::class, $pivot->category);
  }
}
