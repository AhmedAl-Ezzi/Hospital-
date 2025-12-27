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
        Schema::create('notifications', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id');
            // $table->unsignedBigInteger('doctor_id');
            $table->string('message');
            $table->string('description')->nullable();
            $table->boolean('is_read')->default(0);
            $table->tinyInteger('reader_status')->default(0); // 0 = غير مقروء, 1 = مقروء
            $table->timestamps();

            // $table->id();
            // $table->unsignedBigInteger('user_id');
            // $table->string('message');
            // // $table->string('description')->nullable();
            // // $table->boolean('is_read')->default(0);

            // $table->string('title')->nullable();
            // $table->string('invoice_number')->nullable();
            // $table->string('patient_name')->nullable();
            // $table->string('doctor_id')->nullable();
            // $table->string('doctor_name')->nullable();
            // $table->string('invoice_date')->nullable();
            // $table->enum('invoice_type', ['نقدي', 'آجل'])->nullable();
            // $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
