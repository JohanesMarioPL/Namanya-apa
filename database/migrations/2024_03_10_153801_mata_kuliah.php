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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('id', 9)->primary();
            $table->string('nama_mata_kuliah');
            $table->string('kurikulum_id');
            $table->smallInteger('sks');
            $table->smallInteger('prodi_id');
            $table->timestamps();
            $table->foreign('kurikulum_id')->references('id')->on('kurikulum');
            $table->foreign('prodi_id')->references('id')->on('prodi');
        });

        DB::table('mata_kuliah')->insert([
            [   'id' => 'IN210',
                'nama_mata_kuliah' => 'Jaringan Komputer',
                'kurikulum_id' => '2022',
                'sks' => 3,
                'prodi_id' => 1],
            [    'id' => 'BS101',
                'nama_mata_kuliah' => 'Sistem Informasi',
                'kurikulum_id' => '2022',
                'sks' => 3,
                'prodi_id' => 2]
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
