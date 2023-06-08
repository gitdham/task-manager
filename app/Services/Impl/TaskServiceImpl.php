<?php

namespace App\Services\Impl;

use App\Models\Task;
use App\Services\TaskService;

class TaskServiceImpl implements TaskService {
  private $taskModel;

  public function __construct(Task $taskModel) {
    $this->taskModel = $taskModel;
  }

  public function getTaskModel(): Task {
    return $this->taskModel;
  }

  public function getTasks() {
    return $this->taskModel->all();
  }

  public function createTask(array $data): Task {
    return $this->taskModel->create($data);
  }
}
