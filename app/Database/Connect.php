<?php

namespace App\Database;

use App\Config\Config;


class Connect
{
    private string $driver;
    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    public function __construct()
    {
        $this->driver = Config::get("driver");
        $this->host = Config::get("host");
        $this->dbname = Config::get("dbname");
        $this->user = Config::get("user");
        $this->password = Config::get("password");
    }

    public function connect(): \PDO
    {
        return new \PDO("$this->driver:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    }
}
