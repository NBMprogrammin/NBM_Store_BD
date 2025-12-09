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
        Schema::create('my_orders_pay_bsses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idaccountzeboune')->constrained('zeboune_for_users')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('usernameBss')->constrained('profile_user_bsses')->cascadeOnDelete();
            $table->string('namezeboune');
            $table->string('numberzeboune');
            $table->string('namebss');
            $table->string('nameUserBss');
            $table->string('typeorderforzeboune');
            $table->string('imgUserBss');
            $table->string('imgprofilezeboune')->nullable('');
            $table->string('typeaccountzeboune');
            $table->string('nameusergetorder')->nullable('');
            $table->string('idusergetorder')->nullable('');
            $table->string('numberusergetorder')->nullable('');
            $table->string('currentPay');
            $table->string('totalprodectspay');
            $table->string('totalpriceprodectspay');
            $table->longText('nameprodectspay');
            $table->longText('idprodectspay');
            $table->longText('priceprodectspay');
            $table->longText('quantiteyprodectspay');
            $table->string('allquantitelprodect');
            $table->string('imgconfirmedpay')->nullable('');;
            $table->string('typepayment');
            $table->string('paymentmethod');
            $table->string('typMeshole');
            $table->string('idMeshole');
            $table->string('numberpaymentmethod')->nullable('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_orders_pay_bsses');
    }
};
