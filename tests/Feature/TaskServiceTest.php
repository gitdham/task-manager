<?php

namespace Tests\Feature;

use App\Services\TaskService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskServiceTest extends TestCase {
  private TaskService $taskService;

  public function setUp(): void {
    parent::setUp();
    $this->taskService = $this->app->make(TaskService::class);
  }

  public function test_task_not_null() {
    self::assertNotNull($this->taskService);
  }
}
