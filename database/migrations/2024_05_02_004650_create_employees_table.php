<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Genders;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('phone_number')->unique();
            $table->integer('job_number')->unique();
            $table->string('job_type');
            $table->enum('gender',genders::values());
            $table->unsignedBigInteger('period_id');
            $table->string('Nationalit')->nullable();
            $table->unsignedBigInteger('FPID');
            $table->unsignedBigInteger('FDID');
            $table->unsignedBigInteger('department_id');
            $table->string('image')->nullable();
            $table->timestamps();
           // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            //$table->foreign('period_id')->references('id')->on('shifts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
