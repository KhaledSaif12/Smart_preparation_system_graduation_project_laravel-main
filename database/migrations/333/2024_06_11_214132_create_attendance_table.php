<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->string('ImageUrl', 255)->nullable();
            $table->string('DownloadedImagePath', 255)->nullable();
            $table->string('StrTime', 255)->nullable();
            $table->string('Similarity', 255)->nullable();
            $table->string('SnapFacePicID', 255)->nullable();
            $table->string('TempFDIDString', 255)->nullable();
            $table->string('TempPIDString', 255)->nullable();
            $table->string('Glasses', 10)->nullable();
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
};
