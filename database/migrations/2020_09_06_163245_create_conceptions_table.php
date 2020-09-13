<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptionsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            
            $table->string('type')->nullable();
            $table->string('rs_entreprise')->nullable();

            $table->text('logo')->nullable();
            $table->text('activities');
            $table->text('slogan')->nullable();
            $table->text('positionnement')->nullable();
            $table->text('texte_additionnel');

            $table->text('contacts')->nullable();



            $table->string('cible',10)->nullable();
            $table->string('age_cible',10)->nullable();
            $table->string('sex_cible',10)->nullable();
            $table->text('activities_cible')->nullable();

            $table->string('couleur_1',7)->nullable();
            $table->string('couleur_2',7)->nullable();
            $table->string('couleur_3',7)->nullable();
            $table->string('style')->nullable();
            $table->string('font')->nullable();

            $table->string('dimensions')->nullable();


            $table->timestamp('lancer_at')->nullable();
            $table->timestamp('validate_at')->nullable();


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
        Schema::dropIfExists('conceptions');
    }
}
