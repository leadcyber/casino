<?php
/**
 *   Stake iGaming platform
 *   ----------------------
 *   2021_09_28_000000_create_cache_locks_table.php
 * 
 *   @copyright  Copyright (c) Casino, All rights reserved
 *   @author     Casino <info@casino.com>
 *   @see        https://casino.com
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCacheLocksTable extends Migration
{
    
    public function up()
    {
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->unsignedInteger('expiration');

            $table->index('owner');
            $table->index('expiration');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('cache_locks');
    }
}
