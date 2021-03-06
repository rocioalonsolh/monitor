<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_surveys', function (Blueprint $table) {
            //IDENTIFICACIÓN DE PACIENTE
            $table->id(); 
            //estado de si es aprobado y rechazado en r.s. importante para
            $table->string('status')->nullable();
            $table->date('symptoms_epivigila')->nullable();
            $table->string('contactnumber')->nullable();                        
            $table->text('morbid_history')->nullable();
            $table->text('observations')->nullable();

            //CONDICIONES DE HABITABILIDAD
            $table->integer('people')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->boolean('water')->nullable();
            //aislar a la persona
            $table->boolean('isolate')->nullable();


            //Criterios de Inclusión-Exclusión

            $table->boolean('respiratory')->nullable();
            $table->boolean('basicactivities')->nullable();
            $table->boolean('drugs')->nullable();
            $table->boolean('chronic')->nullable();
            $table->boolean('healthnow')->nullable();            
            $table->boolean('risk')->nullable();
            $table->boolean('old')->nullable();

            


            //pregunta más importante para encuestador
            $table->boolean('residency')->nullable();

            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');

            
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admission_surveys');
    }
}
