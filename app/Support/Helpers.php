<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class Helpers
{
    /**
     * Ugly hack replacing Auth
     */
    public static function authCheck(): bool
    {
        return static::authUser() instanceof User;
    }

    /**
     * Ugly hack replacing Auth
     */
    public static function authUser(): ?User
    {
        $user = User::whereEmail(Request::session()->get('email'))->first();

        return ($user instanceof User) ? $user : null;
    }

    /**
     * Read a CSV file and execute a callback to process each line.
     */
    public static function import(string $filename, callable $callback, bool $firstLineIsHeader = true): void
    {
        $first = true;
        $fp = fopen($filename, 'r');
        $headers = null;

        while (!feof($fp)) {
            $line = fgetcsv($fp);

            if ($line === false || count($line) < 1) {
                continue;
            }

            if ($first && $firstLineIsHeader) {
                $first = false;
                $headers = $line;
                continue;
            }

            if (!is_null($headers)) {
                $line = array_combine($headers, $line);
            }

            $callback(self::nullifyFields($line));
        }

        fclose($fp);
    }

    public static function nullifyFields(array $data = [], string $nullValue = 'NULL'): array
    {
        foreach ($data as $key => $value) {
            if ($value == $nullValue) {
                $data[$key] = null;
            }
        }

        return $data;
    }
}
