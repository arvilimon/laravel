<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
             $table->string('first_name');
             $table->string('last_name');
             $table->longText('address');
             $table->string('phone');
             $table->string('zip_code');
             $table->integer('country_id');
             $table->integer('city_id');
             $table->integer('payment_type');
             $table->integer('payment_status');
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
        Schema::dropIfExists('billings');
    }
}
