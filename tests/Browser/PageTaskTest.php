<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PageTaskTest extends DuskTestCase {
  public function test_browser_open_creat_task_link() {
    $this->browse(function (Browser $browser) {
      $browser->visit('/tasks')
        ->assertTitle('Task List')
        ->clickLink('New Task')
        ->assertPathIs('/tasks/create');
    });
  }
}
