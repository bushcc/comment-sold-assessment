<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Support\Helpers;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class OrderSeeder extends Seeder
{
    /**
     * Seed the orders table.
     */
    public function run(): void
    {
        (new ConsoleOutput())->writeln('  <bg=blue> INFO </> Seeding the orders table.');
        Helpers::import(
            env('BASE_DIRECTORY') . '/data/orders.csv',
            fn(array $line) => (new Order())->firstOrCreate($line)
        );
    }
}
