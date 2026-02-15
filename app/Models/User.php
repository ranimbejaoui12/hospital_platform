<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
=======
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // حددنا الاتصال بـ MongoDB
    protected $connection = 'mongodb';
    protected $collection = 'users';

    // الحقول القابلة للتعديل
>>>>>>> 36b2a0c (Doctor Management backend)
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
=======
        'role', // مهم لو عندك roles: admin / doctor / patient
    ];

    // الحقول المخفية
>>>>>>> 36b2a0c (Doctor Management backend)
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
=======
    // casts
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 12 يقوم بالباسورد hashing تلقائياً
    ];
>>>>>>> 36b2a0c (Doctor Management backend)
}
