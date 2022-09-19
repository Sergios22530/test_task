<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backend_error_logs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->longText('message')->comment('Error message');
            $table->longText('context')->comment('User data, with exception info');
            $table->string('level')->index()->comment('Error level');
            $table->string('level_name')->comment('Error level name');
            $table->string('channel')->index()->comment('Laravel logger chanel');
            $table->string('record_datetime')->comment('Error created date');
            $table->longText('extra')->comment('Extra data');
            $table->longText('formatted')->comment('Full error stack');
            // Additional custom fields
            $table->string('remote_addr')->nullable()->comment('Ip address');
            $table->string('user_agent')->nullable()->comment('User agent name');
            $table->dateTime('created_at')->nullable()->comment('Created At');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backend_error_logs');
    }
};
