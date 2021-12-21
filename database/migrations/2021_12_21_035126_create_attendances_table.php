<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId("teacher_id")->nullable()->references("id")->on("users")->onUpdate('cascade')->onDelete('set null');
            $table->foreignId("subject_id")->nullable()->references("id")->on("subjects")->onUpdate('cascade')->onDelete('set null');
            $table->foreignId("class_id")->nullable()->references("id")->on("classes")->onUpdate('cascade')->onDelete('set null');
            $table->date("date");
            $table->string("topic");
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
        Schema::dropIfExists('attendances');
    }
}
