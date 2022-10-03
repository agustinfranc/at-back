<?php

use App\Models\Assignment;
use App\Models\Day;
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
        Schema::create('assignment_day', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Assignment::class);
            $table->foreignIdFor(Day::class);
            $table->integer('hours');
            $table->time('from');
            $table->time('to');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_day');
    }
};
