<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Storage extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['item_name','item_price','item_in_stock'];
    public function task(): hasMany
    {
        return $this->hasMany(Task::class);
    }
    public function sales(): hasMany
    {
        return $this->hasMany(Sales::class);
    }
}
