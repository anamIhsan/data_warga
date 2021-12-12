<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('name');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('gender', ['LK', 'PR']);
            $table->string('desa');
            $table->bigInteger('no_kk')->nullable();
            $table->string('rt');
            $table->string('rw');
            $table->enum('religion', ['Islam', 'Protestan', 'Budha', 'Katolik', 'Hindu', 'Khonghucu']);
            $table->enum('status_perkawinan', ['sudah', 'belum', 'cerai hidup', 'cerai mati']);
            $table->string('pekerjaan');
            $table->enum('status', ['ADA', 'MENINGGAL', 'PINDAH', 'PENDATANG']);
            $table->softDeletes();
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
        Schema::dropIfExists('residents');
    }
}
