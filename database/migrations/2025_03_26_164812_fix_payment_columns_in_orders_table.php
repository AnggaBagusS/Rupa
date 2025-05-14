<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->change(); // Ubah tipe data ke string
            $table->string('payment_status')->change(); // Ubah tipe data ke string
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->linestring('payment_method')->change(); // Kembalikan ke tipe LINESTRING jika rollback
            $table->linestring('payment_status')->change();
        });
    }
};