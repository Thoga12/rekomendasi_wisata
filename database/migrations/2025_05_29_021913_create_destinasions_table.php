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
        Schema::create('destinasis', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // VARCHAR untuk nama destinasi
            $table->text('description'); // TEXT untuk deskripsi panjang
            $table->string('image'); // VARCHAR untuk path/URL gambar
            $table->decimal('latitude', 10, 7); // DECIMAL(10,7) untuk koordinat lintang
            $table->decimal('longitude', 10, 7); // DECIMAL(10,7) untuk koordinat bujur
            $table->string('region')->nullable(); // VARCHAR opsional (bisa NULL)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasions');
    }
};
