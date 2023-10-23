<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranksaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranksaksis', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah');
            $table->string('total');
            $table->string('status');
            $table->foreignid('user_id');
            $table->foreignid('barang_id');
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
        Schema::dropIfExists('tranksaksis');
    }
}
