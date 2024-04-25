<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */



    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id_course')->primary();
            $table->string('point_depart');
            $table->string('point_arrivee');
            $table->dateTime('date_heure');
            $table->foreignId('id_chauffeur')->references('id_chauffeur')->on('chauffeurs');
            // $table->string('statut');
            $table->enum('status',['en_cours','terminer'])->default('en cours');
            $table->timestamps();
        });
    }

    /**
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
