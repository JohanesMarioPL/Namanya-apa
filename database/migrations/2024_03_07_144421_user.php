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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nrp', 9);
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->smallInteger('role_id');
            $table->smallInteger('prodi_id');
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('role');
            $table->foreign('prodi_id')->references('id')->on('prodi');
        });

        DB::table('user')->insert([
           [    'nrp' => '72001',
                'name' => 'Admin',
                'email' => 'admin@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 1,
                'prodi_id' => 0],
           [    'nrp' => '72002',
                'name' => 'Prodi',
                'email' => 'prodi@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 2,
                'prodi_id' => 0],
           [    'nrp' => '72003',
                'name' => 'UserIF',
                'email' => 'userif@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 3,
                'prodi_id' => 1],
           [    'nrp' => '72004',
                'name' => 'UserSI',
                'email' => 'usersi@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 3,
                'prodi_id' => 2],
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
