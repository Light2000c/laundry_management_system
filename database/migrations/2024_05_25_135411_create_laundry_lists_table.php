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
        Schema::create('laundry_lists', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name");
            $table->string("email");
            $table->string("status");
            $table->string("queue");
            $table->string("remark")->nullable();
            $table->string("reference");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_lists');
    }
};
