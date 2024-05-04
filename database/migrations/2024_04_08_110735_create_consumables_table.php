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
        Schema::create('consumables', function (Blueprint $table) {
            $table->id();
            $table->string('fingerpaint');
            $table->string('paper');
            $table->text('cleaningsupplies');
            $table->integer('sippycubs');
            $table->integer('spoons');
            $table->string('crayons');
            $table->integer('garbagebag');
            $table->integer('diabers');
            $table->integer('forks');
            $table->integer('penciles');
            $table->double('bowls');
            $table->double('babywipes');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumables');
    }
};
