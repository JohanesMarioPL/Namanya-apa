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
        Schema::create('polling_detail', function (Blueprint $table) {
            $table->id();
            $table->string('polling_id');
            $table->smallInteger('prodi_id');
            $table->string('mata_kuliah_id');
            $table->string('user_nrp');
            $table->timestamps();
            $table->foreign('prodi_id')->references('id')->on('prodi');
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah');
            $table->foreign('polling_id')->references('id')->on('polling');
            $table->foreign('user_nrp')->references('nrp')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
