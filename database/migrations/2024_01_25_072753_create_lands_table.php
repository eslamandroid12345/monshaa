<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('lands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('الشركه العقاريه');
            $table->unsignedBigInteger('employee_id')->nullable()->comment('رمز الموظف');
            $table->string('address')->comment('العنوان');
            $table->string('seller_name')->comment('اسم البائع');
            $table->integer('size_in_metres');
            $table->integer('price_of_one_meter');
            $table->double('total_cost')->comment('اجمالي السعر');
            $table->string('seller_phone_number');
            $table->enum('advertiser_type',['real_state_owner','real_state_company'])->comment('نوع المعلن');
            $table->longText('advertise_details')->nullable()->comment('تفاصيل الاعلان');
            $table->json('land_images')->nullable()->comment('صور الارض');
            $table->enum('status',['waiting','sale'])->default('waiting');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('employee_id')->references('id')->on('employees')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('lands');
    }
}
