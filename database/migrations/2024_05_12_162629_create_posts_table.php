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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->string('category');
            $table->integer('year');
            $table->string('color');
            $table->integer('mileage');
            $table->integer('price');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
