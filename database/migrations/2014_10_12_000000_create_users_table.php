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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->integer('dni')->unique();
            $table->date('birthdate')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('between_streets')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('cel')->nullable();
            $table->string('school')->nullable();
            $table->integer('grade')->nullable();
            $table->string('email')->unique();
            $table->timestamp('creation_data')->nullable();
            $table->string('password');
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
