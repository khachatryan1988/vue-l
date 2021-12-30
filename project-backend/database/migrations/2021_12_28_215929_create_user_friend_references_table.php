<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFriendReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_friend_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('friend_id');
            $table->timestamp('created_at')->nullable();

            $table->foreign('user_id', 'fk_user_to_friend')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('user_id', 'fk_friend_to_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_friend_references', function (Blueprint $table) {
            $table->dropForeign('fk_user_to_friend');
            $table->dropForeign('fk_friend_to_user');
        });
        Schema::dropIfExists('user_friend_references');
    }
}
