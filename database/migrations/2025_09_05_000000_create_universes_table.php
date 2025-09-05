<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('universes', function (Blueprint $table) {
            $table->id();
            $table->string('universe', 10)->unique();
            $table->string('company', 50);
            $table->string('age', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('universes');
    }
};
