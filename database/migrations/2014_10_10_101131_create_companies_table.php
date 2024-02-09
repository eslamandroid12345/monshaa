<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * بيانات الشركه
         */
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable()->comment('لوجو المؤسسسه');
            $table->string('company_name');
            $table->string('company_address')->comment('عنوان المؤسسه');
            $table->string('company_phone')->comment('رقم هاتف الشركه');
            $table->date('date_start_subscription')->comment('تاريخ بدايه الاشتراك')->nullable();
            $table->date('date_end_subscription')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('block_reason')->nullable()->comment('سبب الغاء تفعيل المكتب العقاري');
            $table->boolean('privacy_and_policy')->default(1);
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
        Schema::dropIfExists('companies');
    }
}
