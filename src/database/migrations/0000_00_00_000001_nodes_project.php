<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NodesProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Módulo General de Tareas
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->boolean('finished')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('task_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->boolean('done')->default(0);
            $table->timestamps();
        });
        // Módulo General de Parametros de Proyectos
        Schema::create('project_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('duties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('project_type_id')->unsigned();
            $table->timestamps();
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
        });
        Schema::create('duty_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duty_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('priority')->nullable()->default(5);
            $table->timestamps();
            $table->foreign('duty_id')->references('id')->on('duties')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('default_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_type_id')->unsigned();
            $table->integer('duty_id')->unsigned();
            $table->string('name')->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->foreign('duty_id')->references('id')->on('duties')->onDelete('cascade');
        });
        Schema::create('default_task_howtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('default_task_id')->unsigned();
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('default_task_id')->references('id')->on('default_tasks')->onDelete('cascade');
        });
        // Módulo General de Proyectos
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('integration_code')->nullable();
            $table->string('name')->nullable();
            $table->integer('project_type_id')->unsigned();
            $table->integer('porcentage')->nullable();
            $table->integer('priority')->nullable();
            $table->date('presentation_date')->nullable();
            $table->enum('status', ['active','support','closed'])->nullable()->default('active');
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
        });
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('default_task_id')->unsigned();
            $table->integer('user_id')->nullable();
            $table->string('integration_code')->nullable();
            $table->string('name')->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->boolean('active')->nullable()->default(1);
            $table->integer('time_hours')->nullable()->default(1);
            $table->text('observations')->nullable();
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('default_task_id')->references('id')->on('projects')->onDelete('cascade');
        });
        Schema::create('project_task_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_task_id')->unsigned();
            $table->string('integration_code')->nullable();
            $table->integer('user_id')->unsigned();
            $table->enum('status', ['started','paused','finished','closed'])->default('started');
            $table->text('observations')->nullable();
            $table->timestamps();
            $table->foreign('project_task_id')->references('id')->on('project_tasks')->onDelete('cascade');
        });
        Schema::create('project_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('integration_code')->nullable();
            $table->string('name')->nullable();
            $table->boolean('active')->nullable()->default(1);
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
        Schema::create('project_issue_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_issue_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('integration_code')->nullable();
            $table->enum('status', ['opened','not-detected','partially-attended','closed','reopened'])->default('opened');
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('project_issue_id')->references('id')->on('project_issues')->onDelete('cascade');
        });
        Schema::create('wiki_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('wikis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('project_type_id')->unsigned();
            $table->integer('wiki_type_id')->unsigned();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->foreign('wiki_type_id')->references('id')->on('wiki_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Módulo General de Proyectos
        Schema::dropIfExists('wikis');
        Schema::dropIfExists('wiki_types');
        Schema::dropIfExists('project_issue_updates');
        Schema::dropIfExists('project_issues');
        Schema::dropIfExists('project_task_updates');
        Schema::dropIfExists('project_tasks');
        Schema::dropIfExists('projects');
        // Módulo General de Parametros de Proyectos
        Schema::dropIfExists('default_task_howtos');
        Schema::dropIfExists('default_tasks');
        Schema::dropIfExists('duty_user');
        Schema::dropIfExists('duties');
        Schema::dropIfExists('project_types');
        // Módulo General de Tareas
        Schema::dropIfExists('task_alerts');
        Schema::dropIfExists('tasks');
    }
}
