<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'role',
        'password',
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

    public function entries()
    {
        return $this->hasMany(AccreditationEntry::class, 'admin_id');
    }

    public function validations()
    {
        return $this->hasMany(Validation::class, 'validator_id');
    }

    public function comments()
    {
        return $this->hasMany(AccreditationComment::class);
    }

    public function criteria()
    {
        return $this->belongsToMany(Criteria::class, 'admin_criteria', 'admin_id', 'criteria_id');
    }
}
