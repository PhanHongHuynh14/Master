<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Message;
use App\Models\User;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::factory()
            ->count(16)
            ->state(new Sequence(
                fn () => [
                    'sender_id' => User::all()->random(),
                ],
            ))
            ->create();
    }
}
