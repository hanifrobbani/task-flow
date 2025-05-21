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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->enum('send_to', ['user', 'company'])->default('user');
            $table->enum('type', ['join-message', 'regular'])->default('regular');
            $table->foreignId('companies_id')->nullable()->constrained('companies')->onDelete('cascade');
            $table->foreignId('users_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
