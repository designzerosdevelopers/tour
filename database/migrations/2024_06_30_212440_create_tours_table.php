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
        Schema::create('tours', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->mediumText('title');
            $table->mediumText('slug')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('attraction_id')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->float('adult_price');
            $table->float('child_price');
            $table->float('private_transport_extra_cost')->nullable();
            $table->string('duration')->nullable()->comment('e.g 2-3 hours');
            $table->string('no_of_people')->nullable()->comment('1, 2,10 etc');
            $table->string('tour_transport')->nullable()->comment('sharing/private');
            $table->string('location');
            $table->json('languages')->nullable();
            $table->json('public_tour_timings')->nullable();
            $table->string('tour_type')->nullable()->comment('half day, full day or hours');
            $table->longText('long_description');
            $table->longText('other_info')->nullable();
            $table->json('includes')->default(null);
            $table->json('excludes')->default(null);
            $table->json('qna')->nullable();
            $table->integer('country_id');
            $table->longText('state_id');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
