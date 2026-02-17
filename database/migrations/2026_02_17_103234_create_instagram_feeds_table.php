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
        Schema::create('instagram_feeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Links to your Product model
        $table->string('image'); 
        $table->string('insta_link')->nullable(); 
        $table->boolean('status')->default(0); // 0=Visible, 1=Hidden
        $table->timestamps();

        // Foreign key to your existing products table
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instagram_feeds');
    }
};
