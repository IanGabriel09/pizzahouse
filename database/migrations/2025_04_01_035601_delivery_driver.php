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
        Schema::create('delivery_drivers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Driver's name
            $table->string('contact'); // Driver's contact number
            $table->string('email')->unique(); // Driver's email address (unique)
            $table->timestamps(); // Created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_drivers');
    }
};
