<?php

class Database
{
    protected $dbName;
    protected $dsn;
    protected $error;
    protected $stmt;
    protected $handler;

    public function __construct(string $driverCode, string $host, string $username, string $password, string $dbname, array $driver_options = array())
    {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
        );
        foreach ($driver_options as $key => $value) {
            $options[$key] = $value;
        }
        $this->dsn = $driverCode . ":host=" . $host . ";dbname=" . $dbname;
        try {
            $this->handler = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function prepare(string $sql)
    {
        $this->stmt = $this->handler->prepare($sql);
    }
    public function query(string $sql): PDOStatement
    {
        $this->stmt = $this->prepare($sql)->execute();
    }
    public function execute()
    {
        $this->stmt->execute($data);
    }
    public function fetchALL(): array
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetch(): array
    {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function fullExecute(string $sql)
    {
        try {
            $stmt = $this->handler->prepare($sql)->execute();
            return true;
        } catch (Throwable $e) {
            throw $e;
        }
    }
    public function fullFetch(string $sql)
    {
        try {
            $stmt = $this->handler->prepare($sql);
            $s    = $stmt->execute();
            if ($s) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array();
            }
        } catch (Throwable $e) {
            throw $e;
        }
    }
    public function prepareAndReturn($sql)
    {
        $stmt = $this->handler->prepare($sql);
        if ($stmt instanceof PDOStatement) {
            return $stmt;
        }
        return false;
    }
}