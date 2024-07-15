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
        Schema::create('address', function (Blueprint $table) {
            $table->id('addressId');
            $table->unsignedBigInteger('userId');
            $table->string('addressName', 200);
            $table->string('addressDetail', 200);
            $table->string('receiverName', 200)->nullable();
            $table->string('phoneNumber', 13)->nullable();
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
