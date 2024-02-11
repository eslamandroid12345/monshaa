<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * سندات الصرف والقبض
         */
        Schema::create('financial_bonds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tenant_contract_id')->comment('السند تابع لانهي عقد');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->comment('الموظف او المدير العام');
            $table->date('transaction_date')->comment('تاريخ تسجيل القسط');
            $table->double('total_amount')->comment('قيمه القسط');
            $table->enum('commission_type',['per','val'])->comment('نوع العموله');
            $table->double('commission',10,2)->comment('عموله الشركه');
            $table->date('contract_date_from')->comment('الايجار من');
            $table->date('contract_date_to')->comment('الايجار الي');
            $table->enum('financial_type',['receipt','cash'])->comment('نوع السند - صرف - قبض');
            $table->foreign('tenant_contract_id')->references('id')->on('tenant_contracts')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('financial_bonds');
    }
}
