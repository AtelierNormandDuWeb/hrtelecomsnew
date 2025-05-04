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
		Schema::create('realizations', function (Blueprint $table) {
        	$table->id();
        	$table->string('name')->nullable();
			$table->string('slug');
			$table->text('description');
			$table->text('moreDescription');
			$table->longtext('additionalInfos')->nullable();
			$table->json('imageUrls');
        	$table->timestamps();
        });

		Schema::create('category_realization', function (Blueprint $table) {
                    $table->foreignIdFor(\App\Models\Realization::class)->constrained()->onDelete('cascade');
                    $table->foreignIdFor(\App\Models\Category::class)->constrained()->onDelete('cascade');
                    $table->primary(['realization_id','category_id']);
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realizations');
    }
};
