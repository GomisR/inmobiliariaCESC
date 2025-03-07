<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pisos', function (Blueprint $table) {
            $table->id();
            $table->string('calle');
            $table->decimal('precio', 10, 2);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('comunidad_autonoma_id')->nullable();
            $table->foreign('comunidad_autonoma_id')->references('id')->on('comunidad_autonomas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pisos');
        Schema::table('pisos', function (Blueprint $table) {
            $table->dropForeign(['comunidad_autonoma_id']);
            $table->dropColumn('comunidad_autonoma_id');
        });
    }
};
