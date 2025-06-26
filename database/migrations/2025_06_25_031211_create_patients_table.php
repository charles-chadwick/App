<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('prefix')
                ->nullable();
            $table->string('first_name');
            $table->string('middle_name')
                ->nullable();
            $table->string('last_name');
            $table->string('suffix')
                ->nullable();
            $table->date('dob');

            $table->string('gender');
            $table->string('species')
                ->nullable();
            $table->string('email');
            $table->string('password');

            $table->timestamps();
            $table->softDeletes();
            $table->integer('old_id')
                ->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
