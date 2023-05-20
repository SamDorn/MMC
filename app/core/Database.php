<?php

namespace App\core;

use PDO;

class Database
{
    private static PDO $connectionInstance;

    private function __construct()
    {
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        self::$connectionInstance = new PDO("mysql:host=127.0.0.1;dbname=mmc", 'root', "", $options);
    }

    /**
     * Uses singleton pattern so that there is only one PDO instance
     * throughout the application.
     *
     * @return PDO instance
     */
    public static function getConnection(): PDO
    {
        if (!isset(self::$connectionInstance))
            new Database;
        return self::$connectionInstance;
    }
}
