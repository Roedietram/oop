<?php

class Connect
{
    private $host;
    private $user;
    private $password;
    private $dbname;
    private $port;
    private $connection;

    public function __construct($host, $user, $password, $dbname, $port = 3306)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->port = $port;
    }

    public function connect()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->dbname,
            $this->port
        );

        if ($this->connection->connect_error) {
            return "Fout: " . $this->connection->connect_error;
        }

        return "Verbinding succesvol!";
    }
}
