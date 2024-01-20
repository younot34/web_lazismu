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
        Schema::create('program_donasis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_akun');
            $table->string('nama_program');
            $table->unsignedBigInteger('jumlah_donasi_program')->default(0);
            $table->unsignedBigInteger('tersalurkan')->default(0);
            $table->text('deskripsi');
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
        Schema::dropIfExists('program_donasis');
    }
};