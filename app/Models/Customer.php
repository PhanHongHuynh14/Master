<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'makh',
        'age',
        'address',
        'phone',
        'email',
        'bank',
        'sex',
        'cmnd',
        'role_id',
        'user_id',
        'birthday',
    ];

    public function roles()
    {
        return $this->hasMany(Role::class, 'id', 'role_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function phone_zalos()
    {
        return $this->hasMany(Phonezalo::class);
    }
}
