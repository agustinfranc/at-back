<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssignmentTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AssignmentTemplate::factory(10)->create();
    }
}
