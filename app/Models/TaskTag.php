<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskTag extends Pivot {
    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function tag() {
        return $this->belongsTo(Tag::class);
    }
}
