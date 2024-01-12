<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * الموظفين
         */
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('password');
            $table->enum('status',['active','not_active'])->default('active');
            $table->string('block_reason')->nullable()->comment('سبب الغاء تفعيل المكتب العقاري');
            $table->string('address');
            $table->string('card_number')->comment('رقم بطاقه الهويه');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id','user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
}
