<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        (new InventorySeeder)->run();
        (new OrderSeeder)->run();
        (new ProductSeeder)->run();
        (new UserSeeder)->run();
        (new ConsoleOutput())->writeln(PHP_EOL . '  <bg=blue> INFO </> Seeding database completed.' . PHP_EOL);
    }
}
