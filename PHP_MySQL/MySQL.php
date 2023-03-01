<?php

class MySQL implements IDB
{
    private $connection;

    public function connect(
        string $host = "",
        string $username = "",
        string $password = "",
        string $database = ""
    ): ?static {
        $this->connection = mysqli_connect($host, $username, $password, $database);
        if (!$this->connection) {
            return null;
        }
        return $this;
    }

    function select(string $query): array {
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            return [];
        }
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function insert(string $table, array $data): bool {
        $keys = array_keys($data);
        $values = array_map(function ($value) {
            return "'" . mysqli_real_escape_string($this->connection, $value) . "'";
        }, array_values($data));
        $query = "INSERT INTO $table (" . implode(',', $keys) . ") VALUES (" . implode(',', $values) . ")";
        $result = mysqli_query($this->connection, $query);
        return $result !== false;
    }

    function update(string $table, int $id, array $data): bool {
        $values = [];
        foreach ($data as $key => $value) {
            $values[] = "$key='" . mysqli_real_escape_string($this->connection, $value) . "'";
        }
        $query = "UPDATE $table SET " . implode(',', $values) . " WHERE id=$id";
        $result = mysqli_query($this->connection, $query);
        return $result !== false;
    }

    function delete(string $table, int $id): bool {
        $query = "DELETE FROM $table WHERE id=$id";
        $result = mysqli_query($this->connection, $query);
        return $result !== false;
    }
}