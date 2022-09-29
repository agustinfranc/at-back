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
        Schema::table('companions', function (Blueprint $table) {
            $table->string('nationality');
            $table->integer('cuit');
            $table->date('birth');
            $table->boolean('has_sign_contract');
            $table->dropColumn('dni');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns(['nationality','cuit','birth']);
        Schema::table('companions',function(Blueprint $table){
            $table->integer('dni');
        });
    }
};
