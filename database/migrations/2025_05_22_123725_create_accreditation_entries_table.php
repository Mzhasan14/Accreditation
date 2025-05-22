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
        Schema::create('accreditation_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('accreditation_sections')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->text('description');
            $table->string('link')->nullable();
            $table->string('photo_path')->nullable();
            $table->enum('status', ['draft', 'submitted', 'revised', 'rejected', 'approved_lvl1', 'approved_lvl2'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accreditation_entries');
    }
};
