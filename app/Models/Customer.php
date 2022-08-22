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
        'birthday',

    ];

    public function customers()
    {
        return $this->hasMany(User::class);
    }
}
