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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('latest_gallery');
            $table->text('description');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->string('link')->nullable();
            $table->text('button_text')->nullable();
            $table->string('file_name')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('extension')->nullable();
            $table->string('file_time')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->string('file_path')->nullable();
            $table->foreignId('file_id')->nullable()->constrained('files')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
