<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooqersDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booqers_d', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->string('full_name',50);
            $table->text('address');
            $table->string('phone',13);
            $table->foreignId('city_id');
            $table->foreignId('province_id');
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
        Schema::dropIfExists('booqers_d');
    }
}
