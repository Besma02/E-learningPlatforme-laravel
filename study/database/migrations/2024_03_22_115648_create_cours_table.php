<?php

use App\Models\Commentaire;
use App\Models\Cour;
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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('Titre');
            $table->longText('Description');
            $table->integer('Durée du cours');
            $table->string('Niveau de difficulté');
            $table->integer('Nombre de lecons');
            $table->integer('Nombre de quizz');
            $table->integer('Prix');
             $table->integer('Nombre étudiants accepté');
            $table->timestamps();
        });
       
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropForeignIdFor(Commentaire::class);
            
        });
        
       
        
    }
};
