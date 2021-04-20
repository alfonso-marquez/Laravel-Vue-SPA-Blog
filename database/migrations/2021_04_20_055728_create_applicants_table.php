<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id', 1001);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('age');
            $table->string('details');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::update("ALTER TABLE applicants AUTO_INCREMENT = 1001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
