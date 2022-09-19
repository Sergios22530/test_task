<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->comment('User Id')
                ->nullable()
                ->default(null)
                ->constrained('users')
                ->nullOnDelete()
                ->comment('User');

            $table->string('uuid')
                ->nullable(false)
                ->default(null)
                ->index('idx_uuid_links')
                ->comment('Link uuid');

            $table->timestamp('expired_at')
                ->nullable(true)
                ->default(null)
                ->comment('Expired Link date');

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
        Schema::table('links', function (Blueprint $table) {
            $table->dropIndex('idx_uuid_links');
        });

        Schema::dropIfExists('links');
    }
};
