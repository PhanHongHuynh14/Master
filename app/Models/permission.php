<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public function permissiongroup()
    {
        return $this->belongsTo(PermissionsGroup::class);
    }
    public function rolespermissions()
    {
        return $this->hasMany(RolePermission::class);
    }

}
