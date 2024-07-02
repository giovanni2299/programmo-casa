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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title_apartment',250);
            $table->tinyInteger('rooms')->default(1);
            $table->tinyInteger('beds')->default(1);
            $table->tinyInteger('bathrooms')->default(1);
            $table->smallInteger('sqr_meters');
            $table->text('img_apartment');
            $table->text('description')->nullable();
            $table->string('latitude',15);
            $table->string('longitude',15);
            $table->string('complete_address');
            $table->tinyInteger('visible')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apartments', function(Blueprint $table){

            $table->dropForeign('apartments_user_id_foreign');
        });

        Schema::dropIfExists('apartments');
    }
};
