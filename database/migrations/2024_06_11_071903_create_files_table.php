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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->string('file_path')->nullable();
            $table->string('extension')->nullable();
            $table->string('file_time')->nullable();
            $table->string('description');
            $table->string('link')->nullable();
            $table->string('type'); // Ensure this column is included
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
