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
    $task = Task::factory()->create([
      'title' => 'Task Title'
    ]);

    $this->get('/tasks')
      ->assertOk()
      ->assertSeeText('Task List')
      ->assertSeeText('Task Title');
  }

  public function test_show_task_form() {
    $this->get('/tasks/create')
      ->assertOk()
      ->assertSeeText('Create New Task')
      ->assertSeeText('Form Task')
      ->assertSeeText('Title')
      ->assertSeeText('Description')
      ->assertSeeText('Due Date')
      ->assertSeeText('Priority')
      ->assertSeeText('Status')
      ->assertSeeText('Reset')
      ->assertSeeText('Submit');
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

    $this->post('/tasks', $postData)->assertRedirect('/tasks');
    $this->assertDatabaseHas('tasks', $postData);
  }
}
