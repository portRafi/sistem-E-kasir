<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDefaultStokInBarangsTable extends Migration
{
    public function up()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->integer('stok')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->integer('stok')->change();
        });
    }
}
