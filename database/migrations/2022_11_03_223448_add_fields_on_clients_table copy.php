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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('extra_phone_reference')->nullable()->after('extra_phone');
            $table->string('extra_phone_bis')->nullable()->after('extra_phone_reference');
            $table->string('extra_phone_bis_reference')->nullable()->after('extra_phone_bis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('extra_phone_reference');
            $table->dropColumn('extra_phone_bis');
            $table->dropColumn('extra_phone_bis_reference');
        });
    }
};
