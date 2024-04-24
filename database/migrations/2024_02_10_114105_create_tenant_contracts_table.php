<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * تسجيل عقود الايجار
         */
        Schema::create('tenant_contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->comment('الموظف او المدير العام');
            $table->unsignedBigInteger('tenant_id');
            $table->boolean('is_show')->default(1)->comment('هل تريد ظهور هذا العقد في شاشه العقود المنتهيه');
            $table->boolean('is_expired')->default(0);
            $table->string('owner_name')->comment('اسم المالك');
            $table->string('owner_phone');
            $table->string('owner_card_number');
            $table->string('owner_card_address');
            $table->string('owner_job_title');
            $table->string('owner_nationality');
            $table->string('real_state_address')->comment('عنوان العقار');
            $table->string('governorate')->comment('المحافظه التابع لها العقار');
            $table->enum('real_state_type',['furnished_apartment','empty_apartment','furnished_villa','empty_villa','shop'])->comment('نوع العقار مثال شقه(مفروشه-فارغه) فيلا(مفروشه-فارغه) محل');
            $table->double('real_state_space',10,2)->comment('المساحه');
            $table->string('real_state_address_details')->comment('عنوان العقار تفصيلي');
            $table->string('building_number')->comment('رقم العماره');
            $table->string('apartment_number')->comment('رقم الشقه');
            $table->date('contract_date')->comment('تاريخ تسجيل العقد');
            $table->date('contract_date_from')->comment('الايجار من');
            $table->date('contract_date_to')->comment('الايجار الي');
            $table->double('contract_total',15,2)->comment('قيمه الايجار');
            $table->enum('commission_type',['per','val']);
            $table->double('commission',15,2)->comment('عموله الشركه');
            $table->double('insurance_total',15,2)->comment('التامين');
            $table->enum('cash_type',['owner','company'])->comment('تحصيل الايجار من خلال المالك او الشركه العقاريه');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant_contracts');
    }
}
