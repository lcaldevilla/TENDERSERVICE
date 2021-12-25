<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('id_tender');
            $table->string('title');
            $table->string('summary');
            $table->string('link');
			$table->string('updated');
            $table->string('contractFolderID');
            $table->string('contractFolderStatusCode');
            $table->string('partyName');
            $table->string('procurementProjectName');
            $table->string('realizedLocationCountrySubentity');
            $table->string('tenderSubmissionDeadlinePeriod');
            $table->string('totalAmount');
            $table->string('taxExclusiveAmount');

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
        Schema::dropIfExists('tenders');
    }
}
