<?php

namespace Database\Seeders;

use App\Models\User;
use App\Support\Helpers;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table.
     */
    public function run(): void
    {
        (new ConsoleOutput())->writeln('  <bg=blue> INFO </> Seeding the users table.');
        Helpers::import(
            env('BASE_DIRECTORY') . '/data/users.csv',
            fn(array $line) => (new User())->firstOrCreate($line)
        );
    }
}
