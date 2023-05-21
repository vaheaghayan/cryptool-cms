<?php

use App\Models\CypherCategory;
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
        Schema::create('cypher_categories', function (Blueprint $table) {
            $table->id();
            $table->string('alias');
            $table->string('name');
            $table->enum('show_status', [CypherCategory::STATUS_ACTIVE, CypherCategory::STATUS_INACTIVE]);
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
        Schema::dropIfExists('cypher_categories');
    }
};
