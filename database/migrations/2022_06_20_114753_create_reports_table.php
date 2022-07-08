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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools'); 
            $table->string('indicator_number');
            $table->string('indicator_name');
            $table->string('indicator_detail');
            $table->decimal('score', 4, 2);
            $table->decimal('similar_national', 4, 2);
            $table->decimal('average_city', 4, 2);
            $table->decimal('average_province', 4, 2);
            $table->decimal('average_national', 4, 2);
            $table->string('achievement_point');
            $table->string('achievement_point_detail');
            $table->integer('score_range');
            $table->integer('level');
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
        Schema::dropIfExists('reports');
    }
};
