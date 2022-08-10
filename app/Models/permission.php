<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'permission_group_id',
        'role_id',
    ];

    public function Permissiongroup()
    {
        return $this->belongsTo(PermissionGroup::class, 'permission_group_id', 'id');
    }

    public function Roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }
}
