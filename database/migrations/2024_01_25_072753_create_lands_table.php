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
        /*
         * الاراضي
         */

        Schema::create('lands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->comment('الموظف او المدير العام');
            $table->string('address')->comment('العنوان');
            $table->string('address_details')->comment('العنوان بالتفصيلي');
            $table->string('seller_name')->comment('اسم البائع');
            $table->double('size_in_metres',10,2);
            $table->double('price_of_one_meter',10,2);
            $table->double('total_cost')->comment('اجمالي السعر');
            $table->string('seller_phone_number');
            $table->enum('advertiser_type',['real_state_owner','real_state_company'])->comment('نوع المعلن');
            $table->longText('advertise_details')->nullable()->comment('تفاصيل الاعلان');
            $table->date('land_date_register')->comment('تاريخ تسجيل قطعه الارض');
            $table->enum('status',['waiting','sale'])->default('waiting');
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
