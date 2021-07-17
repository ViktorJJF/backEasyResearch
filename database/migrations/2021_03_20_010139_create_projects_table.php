<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('projectId');
            $table->boolean('configStatus');
            $table->string('title')->unique();
            $table->integer('type');
            $table->integer('studyLevel');
            $table->float('dedicatedTime');
            $table->bigInteger('lastAccessedTime');
            $table->timestamps();
        });
        Schema::create('thesis_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('university_id')->unsigned();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->longText('template');
            $table->text('style');
            $table->text('coverPage');
            $table->timestamps();
        });

        // Schema::create('researches', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->text('coverPage');
        //     $table->longText('body');
        //     $table->longText('references')->nullable();
        //     $table->longText('annexes')->nullable();
        //     $table->text('images')->nullable();
        //     $table->text('tables')->nullable();
        //     $table->text('style');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('thesis_templates');
    }
}
