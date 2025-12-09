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
        Schema::create('edaret_mewevins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('idbss')->constrained('profile_user_bsses')->cascadeOnDelete()->nullable();
            $table->string('numberMewve');
            $table->string('img')->nullable();
            $table->boolean('typerelation')->default(false);
            $table->boolean('edartPaymentProdects')->default(false);
            $table->boolean('edartOreders')->default(false);
            $table->boolean('edartemaney')->default(false);
            $table->boolean('confirmUser')->default(false);
            $table->boolean('confirmBss')->default(false);
            $table->string('totaledartPayProds');
            $table->string('totalorders');
            $table->string('totaledartmaney');
            $table->string('totaledartPayEct');
            $table->string('idmessagreRel');
            $table->string('curent');
            $table->string('totalMenths');
            $table->string('Ratibe');
            $table->string('nameMewve');
            $table->string('PaymentEcteronect');
            $table->string('typRatibe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edaret_mewevins');
    }
};
