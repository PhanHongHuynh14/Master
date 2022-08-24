<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonezalo extends Model
{
    use HasFactory;
    protected $table = 'phone_zalos';

    protected $fillable = [
        'id',
        'phone_zalo',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
