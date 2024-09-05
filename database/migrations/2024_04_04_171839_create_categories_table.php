<?php

use App\Models\Categories;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',20)->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        $categories = [
            ['name' => 'Scarpe', 'description' => 'Calzature per ogni occasione e attività.'],
            ['name' => 'K-way', 'description' => 'Indumenti impermeabili e traspiranti per proteggerti dalle intemperie.'],
            ['name' => 'Trekking', 'description' => 'Attrezzatura e abbigliamento per escursioni e avventure all\aria aperta.'],
            ['name' => 'Sci', 'description' => 'Attrezzatura per lo sci alpino e lo snowboard.'],
            ['name' => 'Zaini', 'description' => 'Zaini e borsoni per ogni esigenza di trasporto.'],
            ['name' => 'Tende', 'description' => 'Tende per campeggio e outdoor.'],
            ['name' => 'Cappotti', 'description' => 'Ampia selezione di cappotti per tutti i gusti e le occasioni.'],
            ['name' => 'Abbigliamento', 'description' => 'Abiti e accessori per uomo, donna e bambino.'],
            ['name' => 'Cappelli', 'description' => 'Cappelli e berretti di moda e funzionali.'],
            ['name' => 'Attrezzature', 'description' => 'Attrezzature sportive per ogni disciplina.'],
        ];
        foreach($categories as $category){
            Categories::create(['name'=>$category['name'],
                                'description'=>$category['description']
                            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
