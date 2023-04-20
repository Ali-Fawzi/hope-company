<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reports extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['report_type','user_id','date','content'];
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
