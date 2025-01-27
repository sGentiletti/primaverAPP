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
            $table->string('dni')->unique();
            $table->char('gender', 1);
            $table->date('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('between_streets')->nullable();
            $table->string('phone')->nullable();
            $table->string('cel')->nullable();
            $table->string('school')->nullable();
            $table->integer('grade')->nullable();
            $table->string('email')->unique();
            $table->boolean('is_admin')->default(0);
            $table->boolean('verified')->default(0); //Para saber luego en las inscripciones si sus datos son correctos.
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
