<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupervisorSalesperson extends Model
{
    protected $table = 'supervisor_salesperson';
    public $timestamps = false;
    protected $fillable = ['supervisor_id', 'salesperson_id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'salesperson_id');
    }
}
