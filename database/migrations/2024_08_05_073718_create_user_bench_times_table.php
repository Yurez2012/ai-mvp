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
        Schema::create('user_bench_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_bench_id');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps();

            $table->foreign('user_bench_id')
                ->references('id')
                ->on('user_benches')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bench_times');
    }
};
