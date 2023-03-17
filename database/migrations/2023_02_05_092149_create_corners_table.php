<?php

use App\garages;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCornersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corners', function (Blueprint $table) {
            $table->id();
            $table->string('corner_num');
            $table->bigInteger('garage_id');
            $table->boolean('status');
            $table->timestamps();
            
        });
        
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corners');
    }
}
