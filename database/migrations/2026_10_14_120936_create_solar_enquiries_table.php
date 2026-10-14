<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('solar_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('phone', 20);
            $table->string('service', 100);
            $table->string('location', 180);
            $table->string('email', 180)->nullable();
            $table->text('message');
            $table->string('status', 30)->default('new')->index();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            $table->index(['created_at', 'id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solar_enquiries');
    }
};
