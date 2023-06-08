<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller {
  private TaskService $taskService;

  public function __construct(TaskService $taskService) {
    $this->taskService = $taskService;
  }

  /**
   * Display a listing of the resource.
   */
  public function index() {
    $viewData = [
      'title' => 'Task List',
      'tasks' => $this->taskService->getTasks()
    ];

    return response()->view('task', $viewData);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    $this->taskService->createTask($request->input());

    return redirect()->action([TaskController::class, 'index']);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id) {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id) {
    //
  }
}
