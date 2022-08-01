<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable  implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;
    use AuthenticableTrait;
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'address',
        'phone',
        'school_id',
        'type',
        'parent_id',
        'verified_at',
        'closed',
        'code',
        'social_type',
        'social_id',
        'social_name',
        'social_nickname',
        'social_avatar',
        'description',
    ];

    const TYPES = [
        'admin' => 1,
        'student' => 2,
    ];

    public function School()
    {
        return $this->belongsTo(School::class);
    }
    public function Tags()
    {
        return $this->morphedToMany(Tag::class);
    }
    public function Roles()
    {
        return $this->belongstoMany(UserRole::class);
    }
    public function Messages()
    {
        return $this->hasMany(Message::class);
    }

    public function hasVerifiedEmail()
    {
        return ! is_null($this->email_verified_at);
    }
    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }
    public function isAdmin()
    {
        return $this->type == self::TYPES['admin'];
    }
    public function isStudent()
    {
        return $this->type == self::TYPES['student'];
    }
}
