<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cypher\Cypher;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cyphers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('icon');
            $table->text('image_1')->nullable();
            $table->text('image_2')->nullable();
            $table->text('image_3')->nullable();
            $table->enum('show_status', [Cypher::STATUS_ACTIVE, Cypher::STATUS_INACTIVE]);
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
        Schema::dropIfExists('cyphers');
    }
};
