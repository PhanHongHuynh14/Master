<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function taggbles()
    {
        return $this->hasMany(Taggable::class);
    }
    public function userRoles()
    {
        return $this->hasMany(UserRole::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function schools()
    {
        return $this->belongsTo(School::class);
    }
}
