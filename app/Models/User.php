<?php

namespace App\Models;

use Facade\Ignition\Tabs\Tab;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $table = 'users';

    protected $guard = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'alamat',
        'phone_number'
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
    public function history()
    {
        return $this->hasMany(history::class);
    }
    public function check()
    {
        return $this->hasMany(check::class);
    }
    public function checkout()
    {
        return $this->hasMany(checkout::class);
    }
    public function comment()
    {
        return $this->hasMany(comment::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
