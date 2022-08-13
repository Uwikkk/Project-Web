<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pupuk_id');
            $table->foreign('pupuk_id')->references('id')->on('pupuk');
            $table->unsignedBigInteger('kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriteria');
            $table->string('nama_sub');
            $table->integer('bobot_sub');
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
        Schema::dropIfExists('sub_kriteria');
    }
}
