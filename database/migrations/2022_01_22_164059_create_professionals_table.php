<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('verification_status', [0,1])->default(0);
            $table->string('phone');
            $table->integer('service_id')->unsigned();
            $table->integer('sub_service_id')->unsigned();
            $table->integer('experience');
            $table->string('address');
            $table->string('city');
            $table->integer('pincode');
            $table->string('password');
            $table->string('aadhar_card');
            $table->string('other_document');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('service_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_service_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professionals');
    }
}
