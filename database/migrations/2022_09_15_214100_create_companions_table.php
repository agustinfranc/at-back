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
        Schema::create('companions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('dni');
            $table->integer('phone');
            $table->integer('max_taxable');
            $table->boolean('monotax');
            $table->boolean('monotax');
            $table->boolean('criminal_record');
            $table->boolean('insurance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companions');
    }
};
