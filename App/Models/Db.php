<?php

namespace App\Models;


class Db
{
    const DBNAME = 'test3';
    const TABLE = 'users';
    const HOST = '127.0.0.1';
    protected $user = 'root';
    protected $password = '';

    protected $dbh;

    public $queryResult;

    public function __construct()
    {
        try {

            $this->dbh = new \PDO('mysql:host=' . self::HOST . '; dbname=' . self::DBNAME, $this->user, $this->password);
        } catch (\PDOException $e) {
            if (1049!=$e->getCode()) {
                die("DB ERROR: " . $e->getMessage());
            } else {
                try {
                    $this->dbh = new \PDO('mysql:host=' . self::HOST, $this->user, $this->password);
                    $this->createDataBase();
                    $sql = 'USE ' . self::DBNAME;
                    $sth = $this->dbh->prepare($sql);
                    $sth->execute();
                } catch (\PDOException $e) {
                    die("DB ERROR: " . $e->getMessage());
                }
            }
        }

    }

    public function createDataBase($dbName = self::DBNAME)
    {
        $sql = 'CREATE DATABASE IF NOT EXISTS ' . $dbName . ';';

        $this->execute($sql);
    }

    public function checkTable($tableName = self::TABLE)
    {
        $sql = 'SHOW TABLES LIKE \'' . $tableName . '\'';
        $res = $this->query($sql, User::class);
        return (0 != count($res));
    }

    public function createTable ($tableName = self::TABLE)
    {
        $sql = 'CREATE TABLE IF NOT EXISTS ' . $tableName . ' ( id SERIAL NOT NULL , name VARCHAR(100) NOT NULL , parent INT NOT NULL );';
        $this->execute($sql);
    }



    public function execute($sql)
    {
        try {
            $sth =  $this->dbh->prepare($sql);
            return $sth->execute();

        } catch (\Exception $e) {
            die("DB ERROR: ". $e->getMessage());
        }

    }
    
    public function query($sql, $class)
    {
        unset($this->queryResult);
        try {
            $sth =  $this->dbh->prepare($sql);
            $res = $sth->execute();
            if (false!==$res) {
                $this->queryResult = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            } else {
                $this->queryResult = [];
            }
            return $this->queryResult;
        } catch (\Exception $e) {
            die("DB ERROR: ". $e->getMessage());
        }
        
    }
}