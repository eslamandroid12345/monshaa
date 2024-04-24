<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         والايردات * المصروفات
         */
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type',['expense','revenue'])->comment('مصروف-ايراد');
            $table->string('real_state_address')->comment('عنوان العقار في حاله اضافه ايراد جديد')->nullable();
            $table->string('tenant_name')->comment('اسم المستاجر في حاله اضافه ايراد جديد')->nullable();
            $table->string('owner_name')->comment('اسم المالك في حاله اضافه ايراد')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->comment('الموظف او المدير العام');
            $table->unsignedBigInteger('tenant_contract_id')->nullable()->comment('عقد الايجار');
            $table->unsignedBigInteger('receipt_id')->nullable()->comment('سند الصرف');
            $table->double('total_money',15,2);
            $table->string('description');
            $table->date('transaction_date');
            $table->foreign('tenant_contract_id')->references('id')->on('tenant_contracts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('receipt_id')->references('id')->on('receipts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
