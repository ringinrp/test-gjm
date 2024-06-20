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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('poliklink_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('patient_id');
            $table->boolean('has_started');
            $table->timestamps();
            $table->softDeletes();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
