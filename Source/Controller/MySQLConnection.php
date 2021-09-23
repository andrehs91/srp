<?php

namespace Controller;

use PDO;

class MySQLConnection
{
    public static function createConnection(): PDO
    {
        $connection = new PDO('mysql:host=192.168.1.16:3306;dbname=srpdb', 'root', 'root' );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $connection;
    }
}
