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
        Schema::create('leaves_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("leave_id")->nullable()->constrained()->nullOnDelete();
            $table->string("start_date");
            $table->string("end_date");
            $table->integer("days_count");
            $table->enum("status",["waiting","Approve ","Deny"])->default("waiting");
            $table->string("deny_reason")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves_request');
    }
};
