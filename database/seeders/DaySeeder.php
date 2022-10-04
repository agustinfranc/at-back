<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            ['value' => 0, 'title' => "Domingo"],
            ['value' => 1, 'title' => "Lunes"],
            ['value' => 2, 'title' => "Martes"],
            ['value' => 3, 'title' => "Miercoles"],
            ['value' => 4, 'title' => "Jueves"],
            ['value' => 5, 'title' => "Viernes"],
            ['value' => 6, 'title' => "Sabado"],
        ]);
    }
}
