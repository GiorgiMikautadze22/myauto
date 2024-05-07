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
            $table->string('make'); //needs to have foreignId(Car:class)
            $table->string('model'); //needs to have foreignId(Car:class)
            $table->integer('year'); //needs to have foreignId(Car:class)
            $table->string('category'); //needs to have foreignId(Car:class)
            $table->string('steering_wheel');
            $table->string('transmission');
            $table->string('fuel');
            $table->string('color');
            $table->string('description');
            $table->string('cost');
            $table->string('user'); //should have foreignId(User:class)
            $table->string('mobile_number');
            $table->string('role'); //should have foreignId(Role:class)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
