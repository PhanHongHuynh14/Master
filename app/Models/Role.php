<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function Permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function UserRoles()
    {
        return $this->belongsToMany(User::class);
    }
}
