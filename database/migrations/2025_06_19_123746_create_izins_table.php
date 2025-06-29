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
    Schema::create('izins', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke users
        $table->string('alasan'); // alasan izin
        $table->date('tanggal_mulai'); // mulai izin
        $table->date('tanggal_selesai'); // selesai izin
        $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending'); // status
        $table->string('file_bukti'); 
        $table->timestamps(); // created_at & updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izins');
    }
};
