<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PageCreateTaskTest extends DuskTestCase {
  public function test_browser_input_task_form(): void {
    $this->browse(function (Browser $browser) {
      $browser->visit('/tasks/create')
        ->assertTitle('Create New Task')
        ->assertSee('Form Task')
        ->type('title', 'New Task Title')
        ->type('description', 'This is task description')
        ->type('due_date', '12-06-2023')
        ->type('priority', 'Urgent')
        ->type('status', 'Done')
        ->press('Submit')
        ->assertPathIs('/tasks');
    });
  }

  public function test_browser_back_home_from_create_task() {
    $this->browse(function (Browser $browser) {
      $browser->visit('/tasks/create')
        ->assertTitle('Create New Task')
        ->assertSee('Form Task')
        ->clickLink('Back Home')
        ->assertPathIs('/tasks');
    });
  }
}
