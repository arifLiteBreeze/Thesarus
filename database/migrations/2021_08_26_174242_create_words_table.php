<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
     /**
     * Run the migrations.
     * 
     * Create table for words
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word',256);
            $table->unsignedBigInteger('synonyms_pools_id');
            $table->foreign('synonyms_pools_id')->references('id')->on('synonyms_pools');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     * 
     * Drop table for words
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
