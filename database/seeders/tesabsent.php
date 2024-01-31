<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\events;
use App\Models\sesi_absent_event;


class tesabsent extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data user
        $user1 = User::create([
            'nim' => 'F1E121099',
            'id_posisition' => '1',
            'full_name' => 'John Doe 1',
            'id_nft' => '4286862726',
            'password' => bcrypt('password123'),
        ]);

        $user2 = User::create([
            'nim' => 'F1E121094',
            'id_posisition' => '2',
            'full_name' => 'Muktashim Billah',
            'id_nft' => '4266839363',
            'password' => bcrypt('password456'),
        ]);

        // Menambahkan data event
        $event1 = events::create([
            'name_event' => 'Event A',
            'date_start' => now(),
            'date_end' => now()->addDays(1),
            'detail' => 'Deskripsi Event A',
        ]);

        // Menambahkan data sesi absent event
        $sesiAbsentEvent1 = sesi_absent_event::create([
            'id_event' => $event1->id,
            'title' => 'Sesi 1',
            'time_start' => now(),
            'time_end' => now()->addHours(2),
        ]);
    }
}
