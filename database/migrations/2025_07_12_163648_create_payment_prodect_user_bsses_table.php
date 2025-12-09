<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_prodect_user_bsses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('idbss')->constrained('profile_user_bsses')->cascadeOnDelete();
            $table->string('namezeboune');
            $table->string('numberzeboune');
            $table->string('typeaccountzeboune');
            $table->string('idaccountzeboune');
            $table->string('totalprodectspay');
            $table->string('totalpriceprodectspay');
            $table->longText('nameprodectspay');
            $table->longText('idprodectspay');
            $table->longText('priceprodectspay');
            $table->longText('quantiteyprodectspay');
            $table->string('imgconfirmedpay');
            $table->string('typepayment');
            $table->string('paymentmethod');
            $table->string('numberpaymentmethod');
            $table->string('allquantitelprodect');
            $table->string('typMeshole');
            $table->string('idMeshole');
            $table->string('currentPay');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_prodect_user_bsses');
    }
};
