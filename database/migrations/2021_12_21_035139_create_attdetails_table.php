<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId("attendance_id")->nullable()->references("id")->on("attendances")->onUpdate('cascade')->onDelete('set null');
            $table->foreignId("student_id")->nullable()->references("id")->on("users")->onUpdate('cascade')->onDelete('set null');
            $table->string("attstatus",50);
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
        Schema::dropIfExists('attdetails');
    }
}
