
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientSurnameToCommandesTable extends Migration
{
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->string('client_surname')->after('client_name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropColumn('client_surname');
        });
    }
}

