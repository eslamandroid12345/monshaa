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
         * المؤسسه
         */
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable()->comment('لوجو المؤسسسه');
            $table->string('name');
            $table->date('date_start_subscription')->comment('تاريخ بدايه الاشتراك')->nullable();
            $table->date('date_end_subscription')->nullable();
            $table->string('shop_name');
            $table->string('shop_address')->comment('عنوان المؤسسه');
            $table->string('phone');
            $table->string('tax_number')->nullable()->comment('الرقم الضريبي');
            $table->enum('status',['active','not_active'])->default('not_active');
            $table->string('block_reason')->nullable()->comment('سبب الغاء تفعيل المكتب العقاري');
            $table->text('access_token')->nullable();
            $table->boolean('privacy_and_policy')->default(1);
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
