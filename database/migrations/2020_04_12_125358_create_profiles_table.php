<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_number')->unique()->nullable();
            $table->date('age')->nullable();
            $table->string('first_address')->nullable();
            $table->string('second_address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('image')->nullable()->default('1.jpg');
            $table->text('biography')->nullable();
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_id')->nullable()->after('password');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
