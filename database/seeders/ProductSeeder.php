<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Support\Helpers;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class ProductSeeder extends Seeder
{
    /**
     * Seed the products table.
     */
    public function run(): void
    {
        (new ConsoleOutput())->writeln('  <bg=blue> INFO </> Seeding the products table.');
        Helpers::import(
            env('BASE_DIRECTORY') . '/data/products.csv',
            fn(array $line) => (new Product())->firstOrCreate($line)
        );
    }
}
