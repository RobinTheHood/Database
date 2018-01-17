<?php
namespace RobinTheHood\Database;

use RobinTheHood\Database\Database;
use RobinTheHood\Debug\Debug;

class DatabaseAction
{
    public static function execute($sql, $values = [])
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($values);

        if($stmt->errorCode() != 0) {
            Debug::error('SQL-ERROR: ' . $stmt->errorInfo()[2]);
            die();
        }

        return self::lastInsertId();
    }

    public static function query($sql, $values = [])
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($values);

        if($stmt->errorCode() == 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            Debug::error('SQL-ERROR: ' . $stmt->errorInfo()[2]);
            die();
        }

        return $result;
    }

    public static function lastInsertId()
    {
        $pdo = Database::getConnection();
        return $pdo->lastInsertId();
    }
}
