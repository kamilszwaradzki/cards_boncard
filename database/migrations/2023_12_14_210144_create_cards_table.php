<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
Tabela w bazie danych musi zawierać co najmniej pola:

    Nr karty (20 cyfrowa liczba)
    PIN (4 cyfrowa liczba)
    Data aktywacji (dzień miesiąc rok godzina)
    Data ważności (dzień miesiąc rok)
    Saldo (kwota)
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('card_number', 20)->nullable(false);
            $table->string('PIN', 4)->nullable(false);
            $table->dateTime('active_date')->nullable(false);
            $table->date('expiry_date')->nullable(false);
            $table->float('saldo', 8, 2, true)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
