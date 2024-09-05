<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedFloat('price');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
