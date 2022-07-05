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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tamu')->unsigned();
            $table->integer('id_kamar')->unsigned();
            $table->integer('id_assessment')->unsigned()->nullable();
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('total_hari_stay');
            $table->integer('total_dewasa');
            $table->integer('total_anak');
            $table->string('identity');
            $table->longText('note')->nullable();
            $table->longText('note_validasi')->nullable();
            $table->enum('status', ['validating', 'rejected', 'verified']);
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
        Schema::dropIfExists('reservasis');
    }
};
