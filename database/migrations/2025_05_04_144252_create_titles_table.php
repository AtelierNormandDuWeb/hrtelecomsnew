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
		Schema::create('titles', function (Blueprint $table) {
        	$table->id();
        	$table->string('title1')->nullable();
			$table->string('title2')->nullable();
			$table->string('title3')->nullable();
			$table->string('title4')->nullable();
			$table->string('title5')->nullable();
			$table->string('title6')->nullable();
			$table->string('title7')->nullable();
			$table->string('title8')->nullable();
			$table->string('title9')->nullable();
			$table->string('title10')->nullable();
        	$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titles');
    }
};
