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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');

            $table->unsignedBigInteger('type_entretiens_id');
            $table->foreign('type_entretiens_id')
            ->references('type_entretiens_id')
            ->on('entretiens')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->unsignedBigInteger('entretiens_id');
            $table->foreign('entretiens_id')
            ->references('id')
            ->on('entretiens')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict');

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
        Schema::dropIfExists('abonnements');
    }
};
