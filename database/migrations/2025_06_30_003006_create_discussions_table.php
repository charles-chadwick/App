<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->string('on');
            $table->unsignedBigInteger('on_id');
            $table->string('status');
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('discussions');
    }
};
