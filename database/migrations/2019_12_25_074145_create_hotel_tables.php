<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("The Primary Key of the table");
            $table->string('name',55)->comment("The Name of room Types");
            $table->string('descriptions')->comment("The Full Descrption");
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('rooms', function (Blueprint $table){
           $table->bigIncrements('id')->comment("The primary key of the table");
           $table->integer('number')->unique('number')->comment("number of room");
           $table->unsignedBigInteger('room_type_id')->index('room_type_id')->comment("the corrospond room type");
           $table->timestamps();

           $table->foreign('room_type_id')->references('id')->on('room_types');
        });

        Schema::create('discounts', function (Blueprint $table){
           $table->bigIncrements('id')->comment("Table Primary Key");
           $table->string('name',255);
           $table->string('code', 50)->comment("the code someone enter at checkout");
           $table->unsignedInteger('discount')->comment("Discount in whole cents on a room");
            $table->timestamps();
           $table->softDeletes();
        });

        Schema::create('rates', function (Blueprint $table){
           $table->bigIncrements('id')->comment("primary key");
           $table->unsignedInteger('value')->comment("The rate for the whole room");
           $table->unsignedBigInteger('room_type_id')->index('room_type_id')->comment("The room Type");
           $table->boolean('is_weekend')->default(false)->comment("If this is weekend rate");
           $table->timestamps();

           $table->unique(['room_type_id','is_weekend']);
           $table->foreign('room_type_id')->references('id')->on('room_types');
        });

        Schema::create('bookings', function (Blueprint $table){
           $table->bigIncrements('id')->comment("Primary Key");
           $table->unsignedBigInteger('room_id')->index('room_id');
           $table->date('start');
           $table->date('end');
           $table->boolean('is_reservation')->default(false)->comment('if this booking is reservation');
           $table->boolean('is_paid')->default(false)->comment("if booking paid");
           $table->text('notes')->nullable()->comment('Any Note');
           $table->timestamps();
           $table->softDeletes();

           $table->foreign('room_id')->references('id')->on('rooms');

        });

        Schema::create('bookings_users', function (Blueprint $table){
           $table->bigIncrements('id');
           $table->unsignedBigInteger("booking_id")->index('booking_id');
           $table->unsignedBigInteger('user_id')->index('user_id');
           $table->timestamps();
           $table->foreign('booking_id')->references('id')->on('bookings');
           $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_users');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('rates');
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('room_types');

    }
}
