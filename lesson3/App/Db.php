<?php

namespace App;

class Db
{
    protected $dbh;
    public function __construct()
    {
        $conf = new Config();
        $dns = $conf->data['db']['driver']. ':dbname=' . $conf->data['db']['dbname'] . ';host=' . $conf->data['db']['host'];
        $this->dbh = new \PDO(
            $dns,
            $conf->data['db']['user'],
            $conf->data['db']['password']
        );
    }

    public function execute(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump($sth->errorInfo());
            die;
        }
        return true;
    }

    public function query(string $sql, array $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump($sth->errorInfo());
            die;
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