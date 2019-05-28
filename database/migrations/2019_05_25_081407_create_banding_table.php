<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banding', function (Blueprint $table) {
            $table->integer('kriteria_1');
            $table->integer('kriteria_2');
            $table->decimal('nilai_banding', 10, 4);
            
            $table->primary(['kriteria_1', 'kriteria_2']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banding');
    }
}
