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
        Schema::create('entretiens', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('type_entretiens_id');
            $table->foreign('type_entretiens_id')
            ->references('id')
            ->on('type_entretiens')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->string('pseudo');
            $table->float('prix');
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
        Schema::dropIfExists('entretiens');
    }
};
