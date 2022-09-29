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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->unique();
            $table->integer('dni');
            $table->string('phone')->nullable();
            $table->float('rate', 10, 2);
            $table->integer('taxable');
            $table->string('comments')->nullable();
            $table->string('address')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('extra_phone')->nullable();
            $table->date('birthday')->nullable();
            $table->string('medicine')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('treatment')->nullable();
            $table->string('health_insurance')->nullable();
            $table->string('affiliate')->nullable();
            $table->date('budget_date')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
