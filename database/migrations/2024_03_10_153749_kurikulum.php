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
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->string('id', 256)->primary();
            $table->string('nama_kurikulum');
        });
        DB::table('kurikulum')->insert([
            [ 'id' => '2019', 'nama_kurikulum' => 'lama'],
            [ 'id' => '2022', 'nama_kurikulum' => 'baru']
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
