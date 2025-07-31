<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commande_id');
            $table->string('libelle_article');
            $table->integer('qnt');
            $table->decimal('prix_article', 8, 2);
            $table->timestamps();

            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_commandes');
    }
};
