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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->float('price', 8, 2); //dove 8 e 2 sono il massimo e il minimo di cifre digitabili
            //relazione con Category
            $table->unsignedBigInteger('category_id')->nullable(); //Indica che la colonna è di tipo BIGINT senza segno. Questo tipo di colonna può contenere numeri interi molto grandi senza valori negativi.
            $table->foreign('category_id')->references('id')->on('categories');  //crea una relazione tra la colonna category_id della tabella corrente e la colonna id della tabella users. Ciò significa che i valori di category_id devono corrispondere ai valori esistenti della colonna id nella tabella users.
            //relazione con User
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
