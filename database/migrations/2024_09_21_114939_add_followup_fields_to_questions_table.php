<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFollowupFieldsToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedMediumInteger('followup_question_id')->nullable(); // Add followup_question_id field
            $table->string('followup_question_text')->nullable(); // Add followup_question_text field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            // Remove the added fields during rollback
            $table->dropColumn('followup_question_id');
            $table->dropColumn('followup_question_text');
        });
    }
}
