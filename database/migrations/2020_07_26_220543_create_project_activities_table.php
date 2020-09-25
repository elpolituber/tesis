<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-vinculacion')->create('project_activities', function (Blueprint $table) {
            //actividades de proyecto esta se encuentrarn lineas de aceso areas de investigacion, 
            $table->id();
            $table->foreignId('state_id')->constrained('ignug.states');
            $table->foreignId('project_id')->constrained();
            $table->foreignId('type_id')->constrained('catalogues');//un catalogo unico de la tabla
            $table->text('detail',300);
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
        Schema::dropIfExists('bonding_activities');
    }
}
