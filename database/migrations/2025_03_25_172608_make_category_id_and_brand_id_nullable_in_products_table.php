<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->change(); // Jadikan nullable
            $table->foreignId('brand_id')->nullable()->change();    // Jadikan nullable
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable(false)->change(); // Kembalikan ke required jika rollback
            $table->foreignId('brand_id')->nullable(false)->change();    // Kembalikan ke required jika rollback
        });
    }
};