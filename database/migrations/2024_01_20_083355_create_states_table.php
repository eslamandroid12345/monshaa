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
        /*
         * العقارات
         */
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->comment('الموظف او المدير العام');
            $table->string('compound_name')->comment('اسم الكومباوند')->nullable();
            $table->string('building_number')->nullable()->comment('رقم العماره');
            $table->string('apartment_number')->nullable()->comment('رقم الشقه');
            $table->string('real_state_address')->nullable()->comment('عنوان العقار');
            $table->string('real_state_address_details')->comment('عنوان العقار تفصيلي');
            $table->enum('real_state_type',['furnished_apartment','empty_apartment','furnished_villa','empty_villa','shop','empty_office','furnished_office'])->comment('نوع العقار مثال شقه(مفروشه-فارغه) فيلا(مفروشه-فارغه) محل');
            $table->enum('department',['sale','rent'])->comment('القسم بيع ام ايجار');
            $table->string('advertiser_name')->comment('اسم المعلن');
            $table->enum('advertiser_type',['real_state_owner','real_state_company'])->comment('نوع المعلن');
            $table->string('advertised_phone_number')->comment('رقم الهاتف المعلن');
            $table->double('real_state_space',10,2)->comment('المساحه');
            $table->double('real_state_space_price',10,2)->comment('سعر متر البيع في حاله بيع عقار');
            $table->double('real_state_price',10,2)->comment('السعر');
            $table->integer('number_of_bathrooms')->default(0)->comment('عدد الحمامات');
            $table->integer('number_of_rooms')->default(0)->comment('عدد الغرف');
            $table->longText('advertise_details')->nullable()->comment('تفاصيل الاعلان');
            $table->date('state_date_register')->comment('تاريخ تسجيل العقار');
            $table->enum('status',['waiting','sale','rent'])->default('waiting');
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
        Schema::dropIfExists('states');
    }
}
