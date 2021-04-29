<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooqersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booqers', function (Blueprint $table) {
            $table->id();
            $table->string('email',50);
            $table->string('password',64)->nullable();
            $table->enum('is_active',['1','2']);
            $table->enum('login_type',['default','oauth'])->default('default');
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
        Schema::dropIfExists('booqers');
    }
}
