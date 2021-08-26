<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthTokensTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * Create table for auth_tokens
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token',256)->unique();
            $table->timestamps();
        });
    }

      /**
     * Reverse the migration.
     * 
     * Drop table for auth_tokens
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_tokens');
    }
}
