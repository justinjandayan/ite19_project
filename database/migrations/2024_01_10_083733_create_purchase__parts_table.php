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
        Schema::create('purchase_parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parts_id');
            $table->foreign('parts_id')->references('id')->on('parts');
            $table->unsignedBigInteger('customer_id'); // Assuming you have a customers table
            $table->foreign('customer_id')->references('id')->on('users');
            $table->tinyInteger('is_delete')->default(0);
            $table->string('status')->default('pending');
            $table->timestamp('purchase_date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase__parts');
    }
};
