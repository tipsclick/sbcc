<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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

    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }

    public function logins()
    {
        return $this->hasMany(UserLoginHistory::class)->orderBy('created_at', 'DESC');
    }

    public function last_login()
    {
        return $this->hasOne(UserLoginHistory::class)->orderBy('created_at', 'DESC');
    }

    public function isAdmin()
    {
        return $this->role()->where('name', 'Administrator')->exists();
    }

    public function isUser()
    {
        return $this->role()->where('name', 'User')->exists();
    }

    public function client_visits()
    {
        return $this->hasMany(ClientVisit::class);
    }

}
