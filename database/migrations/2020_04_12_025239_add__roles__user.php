<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolesUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table)
      {
        $table->enum('rol', ['admin', 'vendedor', 'repartidor', 'tienda'])
              ->default('admin')
              ->after('password')
              ->nullable();
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
      Schema::table('users', function (Blueprint $table)
      {
        $table->dropColumn('rol');
        $table->dropColumn('deleted_at');
      });
    }
}
