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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('membername');
            $table->string('memberemail');
            $table->string('membermobile');
            $table->string('membercompany');
            $table->string('regionname');
            $table->string('chaptername');
            $table->string('categoryname');

            // $table->foreignId('region_id')->constrained('regions')->onDelete('cascade');
            // $table->foreignId('chapter_id')->constrained('chapters')->onDelete('cascade');
            // $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
