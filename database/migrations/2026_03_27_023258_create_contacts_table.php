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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            // Cédula como clave única (Regla de integridad del Taller)
            $table->string('cedula')->unique(); 
            
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('edad'); // Validaremos 15-90 en el controlador
            
            // Restricción de opciones (Enum)
            $table->enum('genero', ['femenino', 'masculino', 'otros']);
            $table->enum('estado_civil', ['soltero', 'casado', 'divorciado', 'concubinato', 'viudo']);
            
            // Guardamos los arrays como tipo JSON
            $table->json('telefono'); 
            $table->json('correo');
            
            $table->text('direccion');
            $table->string('departamento');
            $table->string('cargo');
            
            $table->timestamps(); // Crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
