<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersRoleIdForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');

        });
        // Schema::table('receipts', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
        });
        // Schema::table('receipts', function (Blueprint $table) {
        //     $table->dropForeign('receipts_user_id_foreign');
        // });
    }
}
