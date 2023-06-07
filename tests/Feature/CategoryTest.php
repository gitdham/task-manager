<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase {
  use RefreshDatabase;

  public function test_category_can_be_created() {
    $category = Category::factory()->create();
    $this->assertModelExists($category);
  }

  public function test_category_can_be_retrieved() {
    Category::factory(10)->create();
    $categories = Category::all();

    $this->assertCount(10, $categories);
  }

  public function test_selected_category_can_be_retrieved() {
    $createdCategory = Category::factory()->create();
    $category = Category::find($createdCategory->id);

    $this->assertEquals($createdCategory->name, $category->name);
  }

  public function test_selected_category_can_be_updated() {
    $createdCategory = Category::factory()->create();
    $selectedCategory = Category::find($createdCategory->id);
    $selectedCategory->name = 'New Name';
    $selectedCategory->save();

    $this->assertDatabaseHas('categories', [
      'name' => 'New Name'
    ]);
  }

  public function test_selected_category_can_be_deleted() {
    $createdCategory = Category::factory()->create();
    Category::destroy($createdCategory->id);

    $this->assertModelMissing($createdCategory);
  }
}
