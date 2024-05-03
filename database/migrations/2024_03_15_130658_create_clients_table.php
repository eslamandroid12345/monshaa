<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->comment('الموظف او المدير العام');
            $table->string('name')->comment('اسم العميل');
            $table->string('phone');
            $table->unsignedBigInteger('code')->nullable();
            $table->enum('department',['state_sale','state_rent','land_sale'])->comment('عقارات بيع او عقارات ايجار او ارض بيع');
            $table->date('inspection_date')->nullable()->comment('تاريخ المعاينه');
            $table->time('inspection_time')->nullable()->comment('وقت المعاينه');
            $table->enum('status',['waiting','inspection','inspection_accepted','inspection_refused'])->default('waiting')->comment('حاله المعاينه');
            $table->text('notes')->comment('الملاحظات')->nullable();
            $table->enum('client_type',['client','company']);
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
