<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToResumeProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resume_profile', function (Blueprint $table) {
            $table->string('email');
            $table->string('fone');
            $table->string('address');
            $table->string('function');
            $table->decimal('pricing', 8, 2)->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('site')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resume_profile', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('fone');
            $table->dropColumn('address');
            $table->dropColumn('function');
            $table->dropColumn('pricing');
            $table->dropColumn('linkedin');
            $table->dropColumn('github');
            $table->dropColumn('site');
        });
    }
}
