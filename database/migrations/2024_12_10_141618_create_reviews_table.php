<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('reviewable_id'); // Polymorphic ID
            $table->string('reviewable_type');          // Polymorphic Type
            $table->integer('rating')->unsigned();      // Rating (1 to 5)
            $table->text('comment')->nullable();        // Optional Comment
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}