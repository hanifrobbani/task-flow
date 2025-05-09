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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('badge');
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->uuid('projects_id');            
            $table->foreign('projects_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('point')->default(0);
            $table->integer('working_hour')->default(0);
            $table->enum('type', ['team', 'individual'])->default('individual');
            $table->string('list_name');
            $table->integer('progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
