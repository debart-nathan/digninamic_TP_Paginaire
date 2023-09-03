<?php

namespace Nath\TpPaginaire\Kernel;

use PDOStatement;

class Model
{
    private static $pdo;
    public function __construct()
    {
        self::$pdo = ConnectPdo::getInstance();
    }


    private static function getEntityName()
    {
        $className = static::class;
        $tab = explode('\\', $className);
        return $tab[count($tab) - 1];
    }

    private static function getClassName()
    {
        return static::class;
    }

    private static function Execute($sql, $data)
    {
        $pdoStatement = static::$pdo->prepare($sql);
        $pdoStatement->execute($data);
        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, static::getClassName());
    }
    public static function getAll(string $limit = null)
    {
        $sql = "SELECT * FROM " . static::getEntityName(). " LIMIT $limit";
        return static::Execute($sql, []);
    }

    public static function getById(int $id)
    {
        $sql = "SELECT * FROM " . static::getEntityName() . " WHERE id=:id";
        return static::Execute($sql, ["id" => $id]);
    }

    public static function insert(array $datas)
    {
        $sql = "INSERT INTO " . static::getEntityName() . " values ( ";
        if (!isset($datas["id"])){
            $sql ="NULL ,";
        }
        
        $count = count($datas);
        $i = 1;
        foreach ($datas as $key => $data) {
            if ($i < $count) {
                $sql .= ":$key, ";
            } else {
                $sql .= ":$key ";
            }
            $i++;
        }
        $sql .= ")";
        return static::Execute($sql, $datas);
    }

    public static function delete(int $id)
    {
        $sql = "DELETE FROM " . static::getEntityName() . " where id=:id";
        return static::Execute($sql, ["id" => $id]);
    }

    public static function update(int $id, array $datas)
    {
        $sql = "update " . static::getEntityName() . " set ";
        $count = count($datas);
        $i = 1;
        foreach ($datas as $key => $value) {
            if ($i < $count) {
                $sql .= "$key= :$key, ";
            } else {
                $sql .= "$key= :$key";
            }
            $i++;
        }
        $datas["oldId"] = $id;
        $sql .= " where id= :oldId";

        return static::Execute($sql, $datas);
    }

    public static function getByAttributes(array $attributes, string $limit = null)
    {
        $sql = "SELECT * FROM " . static::getEntityName() . " where ";
        $count = count($attributes);
        $i = 1;
        foreach ($attributes as $key => $value) {
            if ($i < $count) {
                $sql .= "$key= :$key AND ";
            } else {
                $sql .= "$key= :$key ";
            }
            $i++;
        }
        $sql .= "LIMIT $limit ";

        return static::Execute($sql, $attributes);
    }
}
