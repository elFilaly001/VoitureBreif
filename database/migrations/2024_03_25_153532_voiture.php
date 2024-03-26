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
        Schema::create(
            "voitures",
            function (Blueprint $table) {
                $table->id();
                $table->string("marque");
                $table->string("modele");
                $table->string("annee");
                $table->string("kilometrage");
                $table->string("prix");
                $table->string("puissance");
                $table->string("motorisation");
                $table->string("carburant");
                $table->string("options");
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
