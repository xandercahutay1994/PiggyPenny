<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_tasks', function (Blueprint $table) {
            $table->increments('btask_id');
            $table->integer('task_id');
            $table->integer('id');
            $table->string('taskName');
            $table->string('taskMedia');
            $table->string('totalViews');
            $table->string('currentViews');
            $table->string('totalPrice');
            $table->timestamp('requested_at')->useCurrent();
            $table->integer('notification_status')->nullable(); 
            $table->dateTime('notified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_tasks');
    }
}
