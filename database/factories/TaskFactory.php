<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array {
    return [
      'user_id' => User::factory()->create()->id,
      'title' => fake()->sentence(3),
      'description' => fake()->sentence(6),
      'due_date' => fake()->dateTimeInInterval('+3 days'),
      'priority' => 'urgent',
      'status' => 'pending',
    ];
  }
}
