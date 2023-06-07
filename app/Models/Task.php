<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'priority',
        'status',
    ];

    /**
     * Get the user that owns the task.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that related the task.
     */
    public function categories() {
        return $this->belongsToMany(Category::class, 'task_category')->using(TaskCategory::class);
    }

    /**
     * Get the tag that related the task.
     */
    public function tags() {
        return $this->belongsToMany(Tag::class, 'task_tag')->using(TaskTag::class);
    }
}
