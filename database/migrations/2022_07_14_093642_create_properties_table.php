<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->integer('terreno');
            $table->integer('salas');
            $table->integer('banheiros');
            $table->integer('dormitorios');
            $table->integer('garagens');
            $table->text('descricao')->nullable();
            $table->decimal('preco', 12, 2);

            $table->foreignId('city_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('goal_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('properties');
    }
};
