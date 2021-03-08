<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->after('password');
            $table->enum('gender',['male', 'female', 'other'])->after('age');
            $table->unsignedBigInteger('rol_id')->default(1)->after('gender');
            $table->boolean('status')->default(1)->after('rol_id');

            $table->foreign('rol_id')->references('id')->on('roles')->onDelate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_rol_id_foreign');
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('status');
        });
    }
}
