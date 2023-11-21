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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_photo_url', 2048)->nullable();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_vendor')->default(false);
            $table->boolean('is_user')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });

        // Create Default Admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'phone' => '081234567890',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,
            'is_vendor' => true,
            'is_user' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
