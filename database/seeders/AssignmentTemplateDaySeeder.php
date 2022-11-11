<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssignmentTemplateDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AssignmentTemplateDay::factory(10)->create();
    }
}
