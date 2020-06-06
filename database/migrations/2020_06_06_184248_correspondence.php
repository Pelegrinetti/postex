<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Correspondence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correspondences', function (Blueprint $table) {
            $table->id();
            $table->string('recipient', 80);
            $table->string('street', 80);
            $table->string('cep', 8);
            $table->string('city', 60);
            $table->string('uf', 2);
            $table->string('status', 20);
            $table->foreign('id_recipient')->references('id')->on('recipients');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('correspondences');
    }
}
