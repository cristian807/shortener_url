<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('shorteners', function (Blueprint $table) {
            $table->id();
            $table->string('code_url')->unique();
            $table->string('origin_url');
            $table->string('new_url');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('shorteners');
    }
};
