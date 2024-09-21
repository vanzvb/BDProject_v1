<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('email');
        $table->string('middle_name')->nullable()->after('first_name');
        $table->string('last_name')->nullable()->after('middle_name');
        $table->string('blood_type')->nullable()->after('last_name');
        $table->integer('age')->nullable()->after('blood_type');
        $table->string('gender')->nullable()->after('age');
        // Add new columns
        $table->string('civil_status')->nullable()->after('gender');
        $table->string('nationality')->nullable()->after('civil_status');
        $table->string('occupation')->nullable()->after('nationality');
        $table->text('address')->nullable()->after('occupation');
        $table->text('contact_info')->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('blood_type');
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('contact_info');
        });
    }
}
