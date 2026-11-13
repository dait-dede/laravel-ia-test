<?php

namespace Tests\Feature;

use App\Support\ValidadorCompras;
use Tests\TestCase;

class InterfazComprasTest extends TestCase
{
    public function test_el_validador_de_compras_acepta_el_archivo(): void
    {
        $archivo = storage_path('app/private/reportes/COMPRAS_INV_20261031.txt');
        @unlink($archivo);

        $this->artisan('compras:interfaz')->assertSuccessful();

        $this->assertFileExists($archivo);

        [$ok, $mensaje] = ValidadorCompras::validar($archivo);
        $this->assertTrue($ok, $mensaje);
    }
}
