<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function tags()
    {
        return $this->morphedToMany(Tag::class);
    }
    public function roles()
    {
        return $this->belongstoMany(UserRole::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
