<?php

namespace Nath\TpPaginaire\Kernel;

use Nath\TpPaginaire\Config\Env;
use PDO;

class ConnectPdo extends \PDO {
    private static $pdo =null;

    private function __construct()
    {
        try {
            parent::__construct(Env::DSN, Env::USER, Env::PASS);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance(){
        if (self::$pdo === null) {
            self::$pdo = new static();
        }
        return self::$pdo;
    }

    public static function endInstance(){
        self::$pdo=null;
    }
}