<?php

namespace App\Models;


class Db
{
    const DBNAME = 'sevenwinds';
    const TABLE = 'users';
    const HOST = '127.0.0.1';
    protected $user = 'root';
    protected $password = '';

    public function createDataBase($dbName = self::DBNAME)
    {
        try {
            $dbh = new \PDO('mysql:host=' . self::HOST, $this->user, $this->password);

            $sql = 'CREATE DATABASE IF NOT EXISTS ' . $dbName . ';';
            $dbh->exec($sql)
            or die(print_r($dbh->errorInfo(), true));

        } catch (\PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
    }

    public function createTable ($dbName = self::DBNAME, $tableName = self::TABLE)
    {
        try {
            $dbh = new \PDO('mysql:host=' . self::HOST . '; dbname=' . $dbName, $this->user, $this->password);

            $sql = 'CREATE TABLE IF NOT EXISTS '.$dbName.'.' . $tableName . ' ( id SERIAL NOT NULL , name VARCHAR(100) NOT NULL , `parent` INT NOT NULL );';
            $dbh->exec($sql)
            or die(print_r($dbh->errorInfo(), true));

        } catch (\PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
    }
}