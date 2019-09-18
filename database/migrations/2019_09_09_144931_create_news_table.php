<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
             $table->string('title',100);
              $table->string('slug',100);
               $table->text('image')->nullable();
               $table->string('writer',100)->nullable() ;
               $table->text('short_desc')->nullable();
               $table->longText('detail_desc')->nullable();
               $table->dateTime('published_date');
                $table->boolean('status')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
