<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Support\Helpers;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class InventorySeeder extends Seeder
{
    /**
     * Seed the inventory table.
     */
    public function run(): void
    {
        (new ConsoleOutput())->writeln('  <bg=blue> INFO </> Seeding the inventory table.');
        Helpers::import(
            env('BASE_DIRECTORY') . '/data/inventory.csv',
            fn(array $line) => (new Inventory())->firstOrCreate($line)
        );
    }
}
