<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->string('kode_booking',13)->primary();
            $table->string('kode_paket',2);
            $table->unsignedBigInteger('id_member');
            $table->date('tanggal_take');
            $table->time('jam_take');
            $table->integer('status')->default(0);

            $table->foreign('kode_paket')->references('kode_paket')->on('packages');
            $table->foreign('id_member')->references('id')->on('members');
            $table->unique(['tanggal_take', 'jam_take']);
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
        Schema::dropIfExists('bookings');
    }
}
