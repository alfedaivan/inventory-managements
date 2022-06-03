<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('barang_id')->unsigned()->nullable();
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->date('tglMasuk');
            $table->integer('jmlBarang');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_masuk');
    }
}
