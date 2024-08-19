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
        Schema::create('cxs_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_email');
            $table->string('upassword');
            $table->string('full_name');
            $table->enum('user_plan',['SELFEMPLOYED','ENTERPRISE']);
            $table->string('company_name');
            $table->string('login_source');
            $table->enum('user_status',['Active','Inactive']);
            $table->enum('user_role',['Admin','Manager','User']);
            $table->enum('user_type',['Try','Buy']);
            $table->enum('mfa_flag',['Y','N']);
            $table->enum('force_reset_flag',['Y','N']);
            $table->enum('message_center_flag',['Y','N']);
            $table->enum('announcement_flag',['Y','N']);
            $table->string('image_name');
            $table->string('zoho_email');
            $table->string('created_by');
            $table->string('last_udpated_by');
            $table->timestamp('creation_date')->nullable();
            $table->timestamp('last_update_date')->nullable();
            $table->string('created_timezone');
            $table->string('updated_timezone');
            $table->bigInteger('company_id')->default(0);
            $table->string('user_timezone');
            $table->string('attendance_type');
            $table->string('is_try_buy')->default('Try');
            $table->string('OTP');
            $table->string('do_not_show_video')->default('N');
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
