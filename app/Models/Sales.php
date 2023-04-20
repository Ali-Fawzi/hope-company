<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sales extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function storage(): belongsTo
    {
        return $this->belongsTo(Storage::class,'storage_id','id');
    }
}
