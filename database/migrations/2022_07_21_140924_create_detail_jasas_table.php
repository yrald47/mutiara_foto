<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailJasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_jasas', function (Blueprint $table) {
            $table->string('kode_jasa',2);
            $table->unsignedBigInteger('id_member');
            $table->integer('jumlah');
            $table->date('tanggal_take');
            $table->integer('status')->default(0);
            $table->string('file')->nullable();
            $table->timestamps();

            $table->primary(['kode_jasa','id_member','tanggal_take']);

            $table->foreign('kode_jasa')->references('kode_jasa')->on('jasas');
            $table->foreign('id_member')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_jasas');
    }
}
