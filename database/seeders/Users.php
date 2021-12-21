<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => "siswa@gmail.com",
            'password' => Hash::make("siswa123"),
            'name' => "User Siswa",
            'role' => "siswa",
            'class_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        User::create([
            'email' => "guru@gmail.com",
            'password' => Hash::make("guru123"),
            'name' => "User Guru",
            'role' => "guru",
            'class_id' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
