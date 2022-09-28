<?php

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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('extra_phone')->nullable();
            $table->date('birth')->nullable();
            $table->string('medicine')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('job_description')->nullable();
            $table->string('health_insurance')->nullable();
            $table->string('affiliate')->nullable();
            $table->date('budget_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns(['address','guardian_name','birth','medicine','diagnosis',
        'job_description','health_insurance','affiliate','budget_date']);
    }
};
