<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    public function reports(): HasMany
    {
        return $this->hasMany(Reports::class);
    }
    public function salary(): HasOne
    {
        return $this->hasOne(Salary::class);
    }
    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class);
    }
    public function supervisedSalespersons(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'supervisor_salesperson', 'supervisor_id', 'salesperson_id');
    }
    public function supervisorSalespersons(): HasMany
    {
        return $this->hasMany(SupervisorSalesperson::class, 'salesperson_id');
    }
//    public function supervisors(): BelongsToMany
//    {
//        return $this->belongsToMany(User::class, 'supervisor_salesperson', 'salesperson_id', 'supervisor_id');
//    }
}
