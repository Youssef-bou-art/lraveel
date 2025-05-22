<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEfm1sTable extends Migration
{
    public function up()
    {
        Schema::create('efm1s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pdf')->nullable(); // مسار ملف PDF
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('efm1s');
    }
}
