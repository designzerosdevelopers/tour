<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            [
                'name' => 'HeadElement',
                'value' => '<meta name="description" content="Default description">',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NEWS',
                'value' => 'Unlock the Magic of Travel with Travila - Your Gateway to Extraordinary Experiences',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
