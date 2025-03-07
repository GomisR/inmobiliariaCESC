<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comunidades_autonomas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->timestamps();
        });

        Schema::table('pisos', function (Blueprint $table) {
            $table->foreignId('comunidad_autonoma_id')
                ->nullable()
                ->constrained('comunidades_autonomas')
                ->onDelete('set null'); // Si se borra una comunidad, el campo queda null
        });
    }

    public function down(): void
    {
        Schema::table('pisos', function (Blueprint $table) {
            $table->dropForeign(['comunidad_autonoma_id']);
            $table->dropColumn('comunidad_autonoma_id');
        });

        Schema::dropIfExists('comunidades_autonomas');
    }
};

