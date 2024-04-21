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
        Schema::create('prodi', function (Blueprint $table) {
            $table->smallInteger('id')->primary();
            $table->string('nama_prodi');
            $table->timestamps();
        });

        DB::table('prodi')->insert([
            ['id' => 0, 'nama_prodi' => 'admin'],
            ['id' => 1, 'nama_prodi' => 'S1 Teknik Informatika'],
            ['id' => 2, 'nama_prodi' => 'S1 Sistem Informasi']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
