<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('apply_id')->unique();
            $table->json('line_profile')->nullable();
            // Form 1
            $table->string('gender');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('id_card');
            $table->string('education_level')->nullable();
            $table->string('education_lavel_year')->nullable();
            $table->string('education_sublevel')->nullable();
            $table->string('education_year')->nullable();
            $table->string('faculty')->nullable();
            $table->string('university')->nullable();
            $table->integer('amount')->nullable();
            // Form 2
            $table->string('telephone')->unique()->nullable();
            $table->string('telOtp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('email-otp')->nullable();
            // Form 3
            $table->json('consent')->nullable();
            $table->time('consent_time')->nullable();
            // Form 4
            $table->json('address')->nullable();
            $table->json('address_present')->nullable();
            $table->json('address_delivery')->nullable();
            $table->string('accommodation_type')->nullable();
            $table->string('residence_status')->nullable();
            // Form 5
            $table->string('main_occupation')->nullable(); // อาชีพหลัก
            $table->string('nature_employment')->nullable(); // ลักษณะการจ้างงาน
            $table->string('type_business')->nullable(); // ประเภทธุรกิจขององค์กรหรือหน่วยงานที่ทำงานอยู่
            $table->integer('main_income_per_month')->nullable(); // รายได้หลักรวมต่อเดือน
            $table->string('additional_career')->nullable(); // อาชีพเสริม
            $table->string('additional_career_income_per_month')->nullable(); // รายได้เสริมรวมต่อเดือน
            $table->string('number_institutions')->nullable(); // จำนวนสถาบันทั้งหมดที่ปัจจุบันท่านกู้อยู่
            $table->integer('debt_burden_per_month')->nullable(); // ภาระหนี้สินรวมต่อเดือน
            $table->string('marital_status')->nullable(); // สถานภาพสมรส
            $table->integer('person_under_patronage')->nullable(); // จำนวนบุตร
            // Form 6
            $table->json('occupation_detail')->nullable(); // ข้อมูลด้านอาชีพหลัก
            // Form 7
            $table->string('reference_name')->nullable();
            $table->string('reference_type')->nullable();
            $table->string('reference_tel')->nullable();
            // Form 8
            $table->json('documents')->nullable(); // เอกสารที่แนบมา

            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
