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
        Schema::create('female_parents', function (Blueprint $table) {
            $table->id();
            $table->string('mothername');
            $table->string('motherfamilyname');
            $table->string('mmobile')->unique();
            $table->string('mtelephone')->unique();
            $table->string('mpostcode');
            $table->string('maddress');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('female_parents');
    }
};
