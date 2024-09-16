<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('question_text');  // For storing the actual question
            $table->string('category')->nullable();  // Optional category (e.g., health, personal history, etc.)
            $table->enum('type', ['text', 'checkbox', 'radio', 'textarea'])->default('text');  // Define question type
            $table->boolean('is_mandatory')->default(false)->change();
            $table->integer('order')->nullable();  // For ordering questions in the form
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
