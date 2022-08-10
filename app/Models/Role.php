<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'permission_id',
    ];

    public function Permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    public function UserRoles()
    {
        return $this->belongsToMany(User::class);
    }
}
