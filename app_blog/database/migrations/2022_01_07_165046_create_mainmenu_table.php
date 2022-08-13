<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainmenu', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->bigInteger('parent')->default(0);
            $table->enum('category', ['link', 'content', 'file']);
            $table->text('content')->nullable();
            $table->string('url')->nullable();
            $table->string('file')->nullable();
            $table->integer('order');
            $table->integer('status');
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
        Schema::dropIfExists('mainmenu');
    }
}
