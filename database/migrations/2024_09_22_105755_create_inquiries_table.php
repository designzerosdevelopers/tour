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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->boolean('paid')->default(false);
            $table->string('phone');
            $table->string('child_tickets')->nullable();
            $table->string('adult_tickets')->nullable();
            $table->string('private_transport')->nullable();
            $table->float('amount')->nullable();
            $table->string('url')->nullable();
            $table->string('pickup')->nullable();
            $table->string('dropoff')->nullable();
            $table->string('passengers')->nullable();
            $table->string('remarks')->nullable();
            $table->boolean('checked')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
