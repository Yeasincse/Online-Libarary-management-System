<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsseudBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isseud_books', function (Blueprint $table) {
            $table->increments('id');         
            $table->string('BookId');
            $table->string('StudentID');
            $table->string('ReturnDate');
            $table->string('IssuesDate');
            $table->tinyInteger('RetrunStatus')->default(0);
            $table->integer('fine')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isseud_books');
    }
}
