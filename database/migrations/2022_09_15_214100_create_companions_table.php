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
            $table->string('name')->unique();
            $table->string('phone')->nullable();
            $table->integer('max_taxable')->nullable();
            $table->boolean('monotax')->nullable();
            $table->boolean('criminal_record')->nullable();
            $table->boolean('insurance')->nullable();
            $table->string('nationality');
            $table->string('cuit');
            $table->date('birthday');
            $table->boolean('has_sign_contract');
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
        Schema::dropIfExists('companions');
    }
};
