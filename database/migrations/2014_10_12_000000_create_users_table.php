<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         بيانات المدير العام والموظفين
         */
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('job_title')->nullable()->comment('المسمي الوظيفي');
            $table->string('phone');
            $table->string('password');
            $table->text('access_token')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_admin')->default(0);
            $table->text('employee_image')->comment('صوره الموظف')->nullable();
            $table->string('block_reason')->nullable()->comment('سبب الغاء تفعيل الموظف');
            $table->string('employee_address')->nullable();
            $table->string('card_number')->nullable()->comment('رقم بطاقه الهويه للموظف');
            $table->json('employee_permissions')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id','company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('users');
    }
}
