<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_views', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->comment('الشركه');
            $table->unsignedBigInteger('notification_id');
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('notification_id')->references('id')->on('notifications')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('notification_views');
    }
}
