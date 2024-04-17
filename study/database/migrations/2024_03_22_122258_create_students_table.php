<?php

use App\Models\Cour;
use App\Models\Student;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('specialite');
            $table->timestamps();
        });
        Schema::create('cour_student', function (Blueprint $table) {
           $table->foreignIdFor(Student::class)->constrained()->cascadeOnDelete();
           $table->foreignIdFor(Cour::class)->constrained()->cascadeOnDelete();
           $table->primary(['cour_id','student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('cour_student');
    }
};
