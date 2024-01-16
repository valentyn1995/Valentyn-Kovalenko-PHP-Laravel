<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');

            $table->foreign('student_id')
                ->references('id')
                ->on('students');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
