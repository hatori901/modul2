<?php

namespace Database\Seeders;

use App\Models\Subjects as ModelsSubjects;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class Subjects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsSubjects::create([
            'name' => 'Pemrograman Dasar',
            'created_at' => Carbon::now()
        ]);
        ModelsSubjects::create([
            'name' => 'Pemrograman Berbasis Objek',
            'created_at' => Carbon::now()
        ]);
    }
}
