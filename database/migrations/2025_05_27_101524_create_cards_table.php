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
		Schema::create('cards', function (Blueprint $table) {
        	$table->id();
        	$table->string('name');
			$table->string('title')->nullable();
			$table->string('subtitle')->nullable();
			$table->string('avatar_url')->nullable();
			$table->string('background_url')->nullable();
			$table->text('description');
           $table->text('details')->nullable();
            $table->text('contact_info')->nullable();
            $table->integer('sort_order')->default(0);
        	$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
