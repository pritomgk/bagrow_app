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
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->string('position')->nullable();
            $table->unsignedBigInteger('sercat_id')->nullable();
            $table->foreign('sercat_id')->references('sercat_id')->on('service_categories');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
