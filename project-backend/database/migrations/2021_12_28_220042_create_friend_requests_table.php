<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Te ova uxarkum
            $table->unsignedBigInteger('target_user_id'); // Te ova stanum
            $table->boolean('is_denied')->default(false); // Merjaca te che
            $table->timestamps();

            $table->foreign('user_id', 'fk_user_to_friend_request')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('target_user_id', 'fk_target_user_to_friend_request')
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
        Schema::table('friend_requests', function (Blueprint $table) {
            $table->dropForeign('fk_user_to_friend_request');
            $table->dropForeign('fk_target_user_to_friend_request');
        });
        Schema::dropIfExists('friend_requests');
    }
}
