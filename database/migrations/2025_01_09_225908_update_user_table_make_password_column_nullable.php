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
        //alter table user
        Schema::table('users', function (Blueprint $table) {
            //change password column to nullable
            $table->string('password')->nullable(true)->change();
            $table->string('phone_number')->nullable()->index();
            $table->enum('status', ['active', 'inactive', 'suspensed']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //opposite of up
            $table->enum('status', ['active', 'inactive', 'suspensed'])->default('active');
            $table->string('phone_number')->nullable();
            $table->string('password')->nullable(false)->change();
        });
    }
};
