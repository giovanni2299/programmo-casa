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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apartment_id')->nullable();
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
            $table->string('email_sender',250);
            $table->text('text');
            $table->string('name',60);
            $table->string('surname',60);
            $table->string('phone_number',16)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function(Blueprint $table){

            $table->dropForeign('messages_apartment_id_foreign');
        });
        Schema::dropIfExists('messages');
    }
};
