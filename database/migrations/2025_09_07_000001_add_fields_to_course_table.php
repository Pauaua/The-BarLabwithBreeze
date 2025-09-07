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
    Schema::table('courses', function (Blueprint $table) {
            $table->string('name');
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->date('start_date');
            $table->integer('duration_weeks');
            $table->unsignedBigInteger('instructor_id');
            $table->boolean('published_status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'description',
                'image_url',
                'start_date',
                'duration_weeks',
                'instructor_id',
                'published_status',
            ]);
        });
    }
};
