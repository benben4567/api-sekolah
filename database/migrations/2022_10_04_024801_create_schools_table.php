<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->string('nama');
            $table->string('npsn');
            $table->string('alamat');
            $table->string('desa_kel');
            $table->string('kecamatan');
            $table->string('kota_kab');
            $table->string('provinsi');
            $table->string('status');
            $table->string('bentuk');
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
        Schema::dropIfExists('schools');
    }
}
