<?php

namespace Core;

use PDO;
use PDOStatement;

// Connect to a database using PDO (PHP Data Objects) and execture a query
class Database
{
    private PDO $connection;
    private PDOStatement|false $statement;

    public function __construct(array $config, string $username = 'root', string $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find(): mixed
    {
        return $this->statement->fetch();
    }

    public function get(): array
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail(): mixed
    {
        $result = $this->find();

        if (! $result) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return $result;
    }
}
