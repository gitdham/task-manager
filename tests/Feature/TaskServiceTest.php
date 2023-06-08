<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use App\Services\Impl\TaskServiceImpl;
use App\Services\TaskService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskServiceTest extends TestCase {
  use RefreshDatabase;

  private TaskService $taskService;

  public function setUp(): void {
    parent::setUp();
    $this->taskService = $this->app->make(TaskService::class);
  }

  public function test_task_injection() {
    $this->assertInstanceOf(Task::class, $this->taskService->getTaskModel());
  }

  public function test_task_not_null() {
    $this->assertNotNull($this->taskService);
  }

  public function test_create_task() {
    $taskData = [
      'user_id' => User::factory()->create()->id,
      'title' => fake()->sentence(3),
      'description' => fake()->sentence(6),
      'due_date' => fake()->dateTimeInInterval('+3 days'),
      'priority' => 'urgent',
      'status' => 'pending',
    ];

    $createdTask = $this->taskService->createTask($taskData);
    $this->assertInstanceOf(Task::class, $createdTask);
    $this->assertModelExists($createdTask);
  }
}
