<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypalpayments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payerEmail');
            $table->string('paymentId');
            $table->string('payerStatus');
            $table->decimal('transactionFee',2);
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
        Schema::dropIfExists('paypalpayments');
    }
}
