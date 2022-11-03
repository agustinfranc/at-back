<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('extra_phone')->nullable()->after('phone');
            $table->string('extra_phone_reference')->nullable()->after('extra_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companions', function (Blueprint $table) {
            $table->dropColumn('extra_phone');
            $table->dropColumn('extra_phone_reference');
        });
    }
};
