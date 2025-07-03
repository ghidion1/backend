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
    Schema::create('programares', function (Blueprint $table) {
        $table->id();
        $table->string('nume');
        $table->string('prenume');
        $table->string('specialitate');
        $table->string('medic');
        $table->date('data');
        $table->string('ora');
        $table->string('telefon');
        $table->string('email')->nullable();
        $table->string('motiv');
        $table->text('mesaj')->nullable();
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
        Schema::dropIfExists('programares');
    }
};
