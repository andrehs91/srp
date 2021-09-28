<?php

namespace Controller;

use PDO;

class MySQLConnection
{
    public static function createConnection(): PDO
    {
        $connection = new PDO('mysql:localhost:3306;dbname=srpdb', 'root', 'root' );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $connection->exec('USE srpdb;');
        return $connection;
    }
}
