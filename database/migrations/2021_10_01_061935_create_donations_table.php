<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cause_id')->nullable()->constrained()->nDelete('set null');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->index();
            $table->string('country')->index();
            $table->string('zip');
            $table->string('amount');
            $table->string('payment_method')->index();
            $table->tinyInteger('status')->index()->default(0);
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
        Schema::dropIfExists('donations');
    }
}
