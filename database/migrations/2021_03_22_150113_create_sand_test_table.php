<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSandTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sand_tests', function (Blueprint $table) {
            $table->id();
            $table->string('client_ref');
            $table->string('sample_ref');
            $table->time('time');
            $table->string('source');
            $table->string('sand_reading');
            $table->string('sand_reading2');
            $table->string('clay_reading');
            $table->string('clay_reading2');
            $table->string('test_result');
            $table->string('test_result2');
            $table->string('average');
            $table->string('technician_id');
            $table->string('sample_id');
            $table->boolean('status');
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
        Schema::dropIfExists('sand_tests');
    }
}
