<?php

use App\Models\Instructeur;
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
        Schema::create('instructeurs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');

            $table->timestamps();
        });
        Schema::table('cours', function (Blueprint $table) {
            $table->foreignIdFor(Instructeur::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructeurs');
        Schema::table('cours', function (Blueprint $table) {
            $table->dropForeignIdFor(Instructeur::class);
        });
    }
    
};
