<?php

// Connect to a database using PDO (PHP Data Objects) and execture a query
class Database
{
    public $connection;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4';
        $this->connection = new PDO($dsn, 'root');
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}
