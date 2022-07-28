<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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
}
