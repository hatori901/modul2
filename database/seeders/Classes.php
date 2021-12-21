<?php

namespace Database\Seeders;

use App\Models\Classes as ModelsClasses;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class Classes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsClasses::create([
            'name' => '12 Rekayasa Perangkat Lunak',
            'created_at' => Carbon::now(),
        ]);
    }
}
