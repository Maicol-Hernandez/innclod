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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('code', 10)->nullable()->unique();
            $table->string('description', 4000);
            $table->bigInteger('type_document_id')->unsigned();
            $table->bigInteger('process_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_document_id')->references('id')->on('type_documents');
            $table->foreign('process_id')->references('id')->on('processes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
