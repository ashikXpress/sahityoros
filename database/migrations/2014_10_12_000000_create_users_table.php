<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('nick_name',30);
            $table->string('mobile_number_1',30);
            $table->string('mobile_number_2',30);
            $table->string('father_name',30);
            $table->string('mother_name',50);
            $table->string('house_no',30);
            $table->string('road_no',30);
            $table->string('village',100);
            $table->string('post_office',100);
            $table->string('post_code',30);
            $table->string('thana',100);
            $table->string('district',100);
            $table->string('facebook_url',255);
            $table->string('photo',255);
            $table->string('email',50);
            $table->string('password',255);
            $table->boolean('verified')->default(false);
            $table->string('token',100)->nullable();
            $table->string('login_status',10)->default(0);
            $table->string('delete_status',10)->default(1);
            $table->rememberToken();
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
