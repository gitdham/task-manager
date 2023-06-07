<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase {
  use RefreshDatabase;

  public function test_tag_can_be_created() {
    $tag = Tag::factory()->create();
    $this->assertModelExists($tag);
  }

  public function test_tag_can_be_retrieved() {
    Tag::factory(10)->create();
    $tags = Tag::all();

    $this->assertCount(10, $tags);
  }

  public function test_selected_tag_can_be_retrieved() {
    $createdTag = Tag::factory()->create();
    $tag = Tag::find($createdTag->id);

    $this->assertEquals($createdTag->name, $tag->name);
  }

  public function test_selected_tag_can_be_updated() {
    $createdTag = Tag::factory()->create();
    $selectedTag = Tag::find($createdTag->id);
    $selectedTag->name = 'New Name';
    $selectedTag->save();

    $this->assertDatabaseHas('tags', [
      'name' => 'New Name'
    ]);
  }

  public function test_selected_tag_can_be_deleted() {
    $createdTag = Tag::factory()->create();
    Tag::destroy($createdTag->id);

    $this->assertModelMissing($createdTag);
  }
}
