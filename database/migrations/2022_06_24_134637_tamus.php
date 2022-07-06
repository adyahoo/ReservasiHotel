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
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan')->nullable();
            $table->string('nama_belakang')->nullable();
            $table->string('nama_grup')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->mediumInteger('nik')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('negara')->nullable();
            $table->string('kota')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('kode_pos')->nullable();
            $table->boolean('is_group')->nullable();
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
        Schema::dropIfExists('tamus');
    }
};
