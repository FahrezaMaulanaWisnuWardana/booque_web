<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name',100);
            $table->foreignId('user_id');
            $table->text('description');
            $table->text('address');
            $table->foreignId('category_id');
            $table->enum('status',['1','2'])->default('1');
            $table->text('thumbnail');
            $table->string('author',50);
            $table->year('year');
            $table->string('publisher',50);
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
        Schema::dropIfExists('books');
    }
}
