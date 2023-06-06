<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase {
  use RefreshDatabase;

  public function test_task_can_be_created() {
    $task = Task::factory()->create();
    $this->assertModelExists($task);
  }

  public function test_task_can_be_retrieved() {
    Task::factory(10)->create();
    $tasks = Task::all();

    $this->assertCount(10, $tasks);
  }

  public function test_selected_task_can_be_retrieved() {
    $createdTask = Task::factory()->create();
    $task = Task::find($createdTask->id);

    $this->assertEquals($createdTask->title, $task->title);
    $this->assertEquals($createdTask->description, $task->description);
  }

  public function test_selected_task_can_be_updated() {
    $createdTask = Task::factory()->create();
    $selectedTask = Task::find($createdTask->id);
    $selectedTask->title = 'New Title';
    $selectedTask->save();

    $this->assertDatabaseHas('tasks', [
      'title' => 'New Title'
    ]);
  }

  public function test_selected_task_can_be_deleted() {
    $createdTask = Task::factory()->create();
    Task::destroy($createdTask->id);

    $this->assertModelMissing($createdTask);
  }
}
