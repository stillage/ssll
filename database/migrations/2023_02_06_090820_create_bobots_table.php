<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jawaban')->unique();
            $table->decimal('nilai', 16, 8, true);
            $table->decimal('batasan', 16, 8, true);
            $table->string('hasil');
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
        Schema::dropIfExists('bobots');
    }
}
