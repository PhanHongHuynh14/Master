<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
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
