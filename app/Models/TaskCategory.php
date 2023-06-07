<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskCategory extends Pivot {
    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
