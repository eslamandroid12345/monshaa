<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('الشركه العقاريه');
            $table->unsignedBigInteger('employee_id')->nullable()->comment('رمز الموظف');
            $table->json('real_state_images')->nullable()->comment('صور العقار');
            $table->string('building_number')->nullable()->comment('رقم العماره');
            $table->string('apartment_number')->nullable()->comment('رقم الشقه');
            $table->string('real_state_address')->nullable()->comment('عنوان العقار');
            $table->string('real_state_address_details')->nullable()->comment('عنوان العقار تفصيلي');
            $table->enum('real_state_type',['apartment','villa','shop'])->comment('نوع العقار مثال شقه فيلا محل');
            $table->enum('department',['sale','rent'])->comment('القسم بيع ام ايجار');
            $table->enum('advertiser_type',['real_state_owner','real_state_company'])->comment('نوع المعلن');
            $table->string('advertised_phone_number')->comment('رقم الهاتف المعلن');
            $table->integer('real_state_space')->comment('المساحه');
            $table->double('real_state_price',10,2)->comment('السعر');
            $table->integer('number_of_bathrooms')->default(0)->comment('عدد الحمامات');
            $table->integer('number_of_rooms')->comment('عدد الغرف');
            $table->longText('advertise_details')->nullable()->comment('تفاصيل الاعلان');
            $table->enum('status',['waiting','sale','rent'])->default('waiting');
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
        Schema::dropIfExists('states');
    }
}
