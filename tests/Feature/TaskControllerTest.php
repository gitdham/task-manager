<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase {
  use RefreshDatabase;

  public function test_get_all_tasks() {
    // insert fake task
    Task::factory()->create([
      'title' => 'Task Title'
    ]);

    $this->get('/tasks')
      ->assertStatus(200)
      ->assertSeeText('Task List')
      ->assertSeeText('Task Title');
  }

  public function test_create_new_task_success() {
    // create fake user
    $user = User::factory()->create();

    $postData = [
      'user_id' => $user->id,
      'title' => 'My New Task',
      'description' => 'This is task description',
      'due_date' => '2023-06-13',
      'priority' => 'normal',
      'status' => 'pending'
    ];

    $this->post('/tasks', $postData)
      ->assertRedirect('/tasks');

    $this->assertDatabaseHas('tasks', $postData);
  }
}
