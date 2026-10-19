
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solar_media', function (Blueprint $table) {
            $table->id();

            $table->string('mediable_type', 100);
            $table->unsignedBigInteger('mediable_id');

            $table->enum('type', ['image', 'video']);

            $table->string('file_path');
            $table->string('original_name')->nullable();
            $table->string('alt_text')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(
                ['mediable_type', 'mediable_id'],
                'solar_media_owner_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solar_media');
    }
};
