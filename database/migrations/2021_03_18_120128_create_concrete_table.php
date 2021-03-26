<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcreteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concretes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('ref');
            $table->string('type');
            $table->string('type_description');
            $table->string('grade');
            $table->string('mix_description');
            $table->string('age');
            $table->date('cast_date');
            $table->date('test_date');
            $table->string('source');
            $table->string('ticket_number');
            $table->string('truck_number');
            $table->string('project_id');
            $table->string('client_id');
            $table->string('technician_id');
            $table->string('client_ref');
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
        Schema::dropIfExists('concretes');
    }
}
