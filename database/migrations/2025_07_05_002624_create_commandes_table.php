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
            $table->unsignedBigInteger('commande_id')->index(); // مؤقتًا من غير foreign key
            $table->string('libelle_article');
            $table->integer('qnt_article');
            $table->decimal('prix_article', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_commandes');
    }
};

