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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('vin')->nullable();
            $table->string('photo')->nullable();
            $table->string('brands')->nullable();
            $table->string('models')->nullable();
            $table->string('color')->nullable();
            $table->string('engine')->nullable();
            $table->string('transmission')->nullable();
            $table->string('price')->nullable();
            $table->integer('created_by')->nullable();
            $table->tinyInteger('is_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
