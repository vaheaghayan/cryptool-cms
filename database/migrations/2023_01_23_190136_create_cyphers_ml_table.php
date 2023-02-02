<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cyphers_ml', function (Blueprint $table) {
            $table->bigInteger('cypher_id')->unsigned();
            $table->string('lng_code', 2);
            $table->string('title');
            $table->text('info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cyphers_ml');
    }
};
