<?php

namespace App\Support;

/**
 * Invoca el validador oficial del sistema de Compras (binario entregado por Compras).
 */
class ValidadorCompras
{
    /**
     * @return array{0: bool, 1: string} [esValido, mensaje]
     */
    public static function validar(string $archivo): array
    {
        $binario = match (PHP_OS_FAMILY) {
            'Windows' => 'validador.exe',
            'Darwin' => 'validador-macos',
            default => 'validador-linux',
        };
        $ruta = base_path('tools/'.$binario);

        if (! is_executable($ruta)) {
            @chmod($ruta, 0755);
        }

        exec(escapeshellarg($ruta).' '.escapeshellarg($archivo).' 2>&1', $salida, $codigo);

        return [$codigo === 0, trim(implode("\n", $salida))];
    }
}
