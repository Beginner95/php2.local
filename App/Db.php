<?php

namespace App;

class Db
{
    protected $dbh;
    public function __construct()
    {
        $conf = new Config();
        $dns = $conf->data['db']['driver']. ':dbname=' . $conf->data['db']['dbname'] . ';host=' . $conf->data['db']['host'];
        try {
            $this->dbh = new \PDO($dns, $conf->data['db']['user'], $conf->data['db']['password']);
        } catch (\PDOException $e) {
            throw new DbException('Ошибка соединения с БД');
        }

    }

    public function execute(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            throw new DbException('Ошибка запроса к БД');
        }
        return true;
    }

    public function query(string $sql, array $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            throw new DbException('Ошибка запроса к БД');
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}