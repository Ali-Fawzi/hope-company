<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    public function storage(): belongsTo
    {
        return $this->belongsTo(Storage::class);
    }
    public function task(): belongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
