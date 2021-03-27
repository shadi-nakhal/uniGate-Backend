<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('location');
            $table->string('engineer_firstname');
            $table->string('engineer_lastname');
            $table->string('engineer_phone');
            $table->string('engineer_email');
            $table->string('contact_firstname');
            $table->string('contact_lastname');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('client_id');
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
        Schema::dropIfExists('projects');
    }
}
