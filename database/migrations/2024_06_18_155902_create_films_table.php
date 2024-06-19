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
        Schema::create('films', function (Blueprint $table) { //films ha una chiave esterna, quindi per creare questa tabella devo aver già creato la tabella directors
            $table->id();$table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('director_id'); //chiave esterna, chiave primaria della tabella director
            $table->integer('year');
            $table->timestamps();
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
