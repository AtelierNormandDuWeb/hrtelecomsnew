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
		Schema::create('solutions', function (Blueprint $table) {
        	$table->id();
        	$table->string('button1')->nullable();
			$table->string('button2')->nullable();
			$table->string('title')->nullable();
			$table->text('description')->nullable();
			$table->string('liste1')->nullable();
			$table->string('liste2')->nullable();
			$table->string('liste3')->nullable();
			$table->string('liste4')->nullable();
			$table->string('liste5')->nullable();
			$table->string('imageUrl')->nullable();
        	$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
};
