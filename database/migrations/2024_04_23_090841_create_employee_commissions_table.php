<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_commissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->comment('الموظف او المدير اللي عمل الحركه دي');
            $table->unsignedBigInteger('employee_id')->comment('الموظف اللي اتضافله العموله دي');
            $table->double('total_money',15,2);
            $table->string('description');
            $table->string('real_state_address')->comment('عنوان العقار');
            $table->string('tenant_name')->comment('اسم المستاجر');
            $table->string('owner_name')->comment('اسم المالك');
            $table->date('transaction_date')->comment('تاريخ الحركه');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('employee_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_commissions');
    }
}
