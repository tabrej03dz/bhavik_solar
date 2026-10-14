
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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            // Customer Details
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('company')->nullable();
            $table->string('location')->nullable();

            // Customer Photo
            $table->string('image')->nullable();

            // Customer Review
            $table->text('review');

            // Rating (1 to 5)
            $table->unsignedTinyInteger('rating')
                ->default(5);

            // Featured Testimonial
            $table->boolean('is_featured')
                ->default(false);

            // Active / Inactive
            $table->boolean('is_active')
                ->default(true);

            // Display Order
            $table->unsignedInteger('sort_order')
                ->default(0);

            // Timestamps
            $table->timestamps();

            // Indexes
            $table->index('is_active');
            $table->index('is_featured');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
