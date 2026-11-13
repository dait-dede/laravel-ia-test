<?php

namespace App\Console\Commands;

use App\Support\ValidadorCompras;
use Illuminate\Console\Command;

class ValidarInterfazCompras extends Command
{
    protected $signature = 'compras:validar {archivo : Ruta del archivo a validar}';

    protected $description = 'Valida un archivo de interfaz con el validador oficial de Compras';

    public function handle(): int
    {
        [$ok, $mensaje] = ValidadorCompras::validar($this->argument('archivo'));

        $this->line($mensaje);

        return $ok ? self::SUCCESS : self::FAILURE;
    }
}
