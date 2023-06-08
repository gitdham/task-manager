<?php

namespace App\Services;

use App\Models\Task;

interface TaskService {
  public function getTaskModel(): Task;
  public function getTasks();
  public function createTask(array $data): Task;
}
