<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSynonymsPoolsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * Create table for synonyms_pools
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synonyms_pools', function (Blueprint $table) {
            $table->id();
            $table->string('meaning',256)->nullable();
            $table->tinyText('synonyms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     * 
     * Drop table for synonyms_pools
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('synonyms_pools');
    }
}
