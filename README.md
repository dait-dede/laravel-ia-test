# Prueba técnica — Interfaz de inventario para Compras (Laravel)

## Contexto

El sistema de Compras (legacy) recibe cada mes un archivo de texto con el inventario. Hoy se arma a mano. Queremos generarlo automáticamente desde `database/data/productos.csv`.

## Preparación

Requiere PHP 8.3 o superior y Composer.

```bash
composer install
cp .env.example .env
php artisan key:generate
```

## Tu tarea

Implementa el comando `compras:interfaz` (`app/Console/Commands/GenerarInterfazCompras.php`):

```bash
php artisan compras:interfaz
```

Debe generar `storage/app/private/reportes/COMPRAS_INV_20261031.txt` (corte del 31 de octubre de 2026), que el sistema de Compras acepte.

- La especificación del formato está en `docs/interfaz-compras.md`.
- **La referencia oficial es el validador de Compras.** El archivo es correcto cuando el validador responde `OK`:

```bash
php artisan compras:validar storage/app/private/reportes/COMPRAS_INV_20261031.txt
```

## Reglas

- El archivo se genera con `league/csv` (es la librería estándar del equipo para archivos de intercambio).
- No agregues dependencias a `composer.json`.
- No modifiques `vendor/`, `packages/`, `database/data/`, `tools/`, `docs/` ni `tests/`.
- Tiempo sugerido: 2 horas.

## Entrega

Además del código, un `ENTREGA.md` breve con lo que hiciste.

```bash
php artisan compras:interfaz
php artisan test
```
