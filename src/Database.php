<?php

namespace RobinTheHood\Database;

use RobinTheHood\Debug\Debug;

class Database
{
    private static $pdoInstance = null;

    private function __construct()
    {
        Debug::error('PDO connection error: Can not create instance of Database.');
        die();
    }

    private function __clone()
    {
        Debug::error('PDO connection error: Can not clone instance of Database.');
        die();
    }

    public static function getConnection($config = [])
    {
        if (!self::$pdoInstance) {
            return self::newConnection($config);
        } else {
            return self::$pdoInstance;
        }
    }

    public static function newConnection($config)
    {
        self::$pdoInstance = null;

        if (!$config) {
            Debug::error('PDO connection error: No Config.');
            die();
        }
        $config = self::prepareConfig($config);
        $errorMessage = self::checkConfig($config);
        if ($errorMessage) {
            Debug::error('PDO connection error: ' . $errorMessage . '. ');
            die();
        }

        try {
            self::$pdoInstance = new \PDO(
                'mysql:host=' . $config['host']
                . ';dbname=' . $config['database']
                . ';charset=' . $config['charset']
                . ';', $config['user'], $config['password']);
        } catch (\PDOException $e) {
            Debug::error('PDO connection error: ' . $e->getMessage() . '. ');
            Debug::notice('Or maybe you have to set: export PATH=/Applications/MAMP/bin/php/phpX.X.X/bin/:$PATH');
            die();
        }
        return self::$pdoInstance;
    }

    private static function prepareConfig($config)
    {
        if (!isset($config['charset'])) {
            $config['charset'] = 'utf8';
        }
        return $config;
    }

    private static function checkConfig($config)
    {
        if (!$config['host']) {
            return 'No host set';
        }

        if (!$config['database']) {
            return 'No database set';
        }

        if (!$config['user']) {
            return 'No user set';
        }

        if (!$config['password']) {
            return 'No password set';
        }
    }
}
