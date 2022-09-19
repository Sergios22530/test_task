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
        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->comment('User Id')
                ->nullable()
                ->default(null)
                ->constrained('users')
                ->nullOnDelete()
                ->comment('User');

            $table->boolean('result')
                ->default(0)
                ->nullable(false)
                ->comment('Lottery result');

            $table->integer('percent')
                ->default(null)
                ->nullable()
                ->comment('Lottery percent');

            $table->integer('random_value')
                ->nullable(false)
                ->index('idx_result_lotteries')
                ->comment('Random result');

            $table->integer('win_amount')
                ->nullable(false)
                ->index('idx_win_amount_lotteries')
                ->comment('Win Amount');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotteries');
    }
};
