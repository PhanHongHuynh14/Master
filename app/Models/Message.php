<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'zoom',
        'seeder_id',
        'seeder_type',
        'receiver_id',
        'receiver_type',
        'content',
        'content_type',
        'assciation_id',
        'assciation_type',

    ];

    public function Sender()
    {
        return $this->belongsTo((User::class));
    }
}
