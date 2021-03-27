<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompressionTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compression_tests', function (Blueprint $table) {
            $table->id();
            $table->string('client_ref');
            $table->string('sample_ref');
            $table->date('cast_date');
            $table->string('age');
            $table->string('source');
            $table->string('weight');
            $table->string('length');
            $table->string('diameter');
            $table->string('load');
            $table->string('area');
            $table->string('volume');
            $table->string('density');
            $table->string('grade');
            $table->string('mix_description');
            $table->string('mpa');
            $table->string('mpa_per');
            $table->string('fracture');
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
        Schema::dropIfExists('compression_tests');
    }
}
