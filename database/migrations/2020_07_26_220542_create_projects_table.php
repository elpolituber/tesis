<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-vinculacion')->create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charitable_institution_id')->connstrained();                 
           // $table->foreignId('academi_period_id')->connstrained('vinculacion.academi_periods'); y Ejes de vinculacion
            $table->foreignId('career_id')->constrained('ignug.careers');
            $table->foreignId('assigned_line_id')->constrained('ignug.catalogues');//pendiente//lineas de investigacion
            $table->string('code',100);
            $table->text('name',500);
            $table->foreignId('status_id')->constrained('catalogues');//catalogo propio una fk 
            $table->foreignId('state_id')->constrained('ignug.states');
            $table->string('field',100);//campo de area de vinculacion
            $table->string('aim',100);//objeto
            $table->foreignId('fraquency_id')->constrained('catalogues');//frecuencia de actividades
            $table->json('cycle');//ciclo
            $table->foreignId('location_id')->constrained('ignug.locations');//crear tabla de localizacion fk
            $table->integer('lead_time');//plazo de ejecucion
            $table->date('delivery_date');// tiempo
            $table->date('start_date');// tiempo
            $table->date('end_date');//tienmpo
            $table->text('description',1000);//DESCRIPCION GENERAL  DEL PROYECTO.
            $table->string('coordinator_name',300);
            $table->string('coordinator_lastname',300);
            $table->string('coordinator_postition',300);
            $table->string('coordinator_funtion',300);
            $table->text('introduction');
            $table->text('situational_analysis',300);//ANALISIS SITUACIONAL (DIAGNOSTICO)
            $table->text('foundamentation');
            $table->text('justification');
            /* $table->string('authorizedBy_id',200);//fk un tabla intermedia autoridades(enlazada con autitication.user cargo ,fecha de asignacion,fecha teminacion,)
            $table->string('develope_id',200);//fk un tabla intermedia autoridades(enlazada con user cargo ,fecha de asignacion,fecha teminacion,)
            $table->string('revisado_id',200);//fk un tabla intermedia autoridades(enlazada con user cargo ,fecha de asignacion,fecha teminacion,)
            $table->string('firmadopor_id',200);//fk un tabla intermedia autoridades(enlazada con user cargo ,fecha de asignacion,fecha teminacion,) */
            $table->json('bibliografia');//pendiente
            //$table->string('schedules')->constrained('ignug.files');//cronograma

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
        Schema::dropIfExists('projects');
    }
}
