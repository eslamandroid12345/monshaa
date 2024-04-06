<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->comment('الشركه');
            $table->string('title');
            $table->text('body');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->enum('model_type',['STATE','LAND','CASH','RECEIPT','EXPENSE','REVENUE','CONTRACT','CLIENT','CONTRACT_EXPIRE','EMPLOYEE','TECHNICAL_SUPPORT'])->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('notifications');
    }
}
