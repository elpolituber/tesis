<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculacionCataloguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-vinculacion')->create('catalogues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_code_id')->nullable()->references('id')->on('catalogues');
            $table->string('code', 100);
            $table->string('name', 500);
            $table->string('type', 200);
            $table->string('icon', 200)->nullable();
            $table->foreignId('state_id')->constrained('ignug.states');
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
        Schema::dropIfExists('vinculacion_catalogues');
    }
}
