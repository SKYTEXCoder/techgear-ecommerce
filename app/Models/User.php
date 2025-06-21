<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable // implements MustVerifyEmail, FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'phone_number',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    protected static function booted() {
        static::creating(function ($user) {
            if (empty($user->first_name) && empty($user->last_name)) {
                $parts = explode(' ', $user->name, 2);
                $user->first_name = $parts[0] ?? '';
                $user->last_name = $parts[1] ?? '';
            }
        });

        // Before updating an existing user
        /* static::updating(function ($user) {
            $user->name = $user->first_name . ' ' . $user->last_name;
        }); */
    }

    public function getFullNameAttribute() {
        return "{$this->first_name} {$this->last_name}";
    }

    /* public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        if (empty($this->attributes['first_name']) && empty($this->attributes['last_name'])) {
            $parts = explode(' ', $value, 2);
            $this->attributes['first_name'] = $parts[0] ?? null;
            $this->attributes['last_name'] = $parts[1] ?? null;
        }
    } */
}
