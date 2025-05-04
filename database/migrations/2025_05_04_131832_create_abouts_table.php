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
		Schema::create('abouts', function (Blueprint $table) {
        	$table->id();
        	$table->string('title1')->nullable();
			$table->string('title2')->nullable();
			$table->longtext('texte1')->nullable();
			$table->longtext('texte2')->nullable();
			$table->string('button');
			$table->string('imageUrl')->nullable();
        	$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
