<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('StudentId', 100);
            $table->string('FullName', 120);
            $table->string('EmailId', 100)->unique();
            $table->string('MobileNumber');
            $table->string('Password');
            $table->tinyInteger('Status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('students');
    }

}
