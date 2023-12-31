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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->uuid("unique_id");
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('number_of_participants')->nullable();
            $table->string("title");
            $table->string("description")->nullable();
            $table->string("cycle_period")->default("monthly");
            $table->string('number_of_cycles')->nullable();
            $table->string('amount_per_cycle')->nullable();
            $table->string('amount_per_member')->nullable();
            $table->string('currency')->default("GHS");
            $table->datetime("commencement_date")->nullable();
            $table->enum('status',['active','inactive','completed','aborted'])->default('inactive');
            $table->string("approval")->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
