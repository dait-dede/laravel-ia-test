<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerarInterfazCompras extends Command
{
    protected $signature = 'compras:interfaz';

    protected $description = 'Genera la interfaz de inventario para el sistema de Compras';

    public function handle(): int
    {
        // TODO: implementar. Ver README.md y docs/interfaz-compras.md

        $this->error('No implementado');

        return self::FAILURE;
    }
}
