<?php

namespace App;

class Db
{
    protected $dbh;
    public function __construct()
    {
        $conf = include __DIR__ . '/../config.php';
        $dns = $conf['driver']. ':dbname=' . $conf['dbname'] . ';host=' . $conf['host'];
        $this->dbh = new \PDO(
            $dns,
            $conf['user'],
            $conf['password']
        );
    }

    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        $result = $sth->execute($params);

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
}