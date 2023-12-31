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
        Schema::create('group_withdrawal_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreign("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger("organization_id")->nullable();
            $table->string("amount_to_withdraw")->nullable();
            $table->string("cycle_number")->nullable();
            $table->string("group_admin_name")->nullable();
            $table->unsignedBigInteger("payment_method_id")->nullable();
            $table->unsignedBigInteger("status")->default("processing");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_withdrawal_requests');
    }
};
