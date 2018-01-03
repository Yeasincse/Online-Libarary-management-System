<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('BookName',256);
            $table->integer('CatId');
            $table->integer('AuthorId');
			$table->integer('shelfId');
            $table->integer('ISBNNumber')->unique();
            $table->integer('BookPrice');
			$table->integer('TotalBook');
			$table->integer('TotalFixedBook');
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
