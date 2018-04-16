<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('ip_address', 15);
            $table->integer('ssh_port');
            $table->string('authentication_type', 50);
            $table->string('ssh_username');
            $table->string('ssh_password')->nullable();
            $table->longText('private_key_path')->nullable();
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
        Schema::dropIfExists('web_servers');
    }
}
