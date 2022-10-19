<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variables', function (Blueprint $table) {
            $table->string('name', 256)->primary()->collation('utf8_general_ci')->comment('The name of variable');
        });

        \Illuminate\Support\Facades\DB::statement('ALTER TABLE `variables` ADD `value` LONGBLOB NOT NULL COMMENT "The value of variable" AFTER `name`;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variables');
    }
}
