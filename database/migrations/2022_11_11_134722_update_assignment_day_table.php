<?php

use App\Models\Assignment;
use App\Models\AssignmentTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignment_template_day', function (Blueprint $table) {
            $table->dropColumn('assignment_id');
            $table->foreignIdFor(AssignmentTemplate::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assignment_template_day', function (Blueprint $table) {
            $table->dropColumn('assignment_template_id');
            $table->foreignIdFor(Assignment::class);
        });
    }
};
