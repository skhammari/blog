<?php

    namespace App;

    use PDO;

    class DB
    {
        private PDO $pdo;

        public function __construct()
        {
            try {
                $this->pdo = new \PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USER'], $_ENV['DB_PASS'], [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            } catch (\PDOException $exception) {
                throw new \PDOException($exception->getMessage(), $exception->getCode());
            }
        }

        public function getConnection(): PDO
        {
            return $this->pdo;
        }

        public function insert(string $table, array $data): int
        {
            $fields = "";
            $values = "";
            $params = array();
            foreach ($data as $key => $val) {
                $fields .= $key . ',';
                $values .= "?,";
                $params[] = $val;
            }
            $fields = substr($fields, 0, strlen($fields) - 1);
            $values = substr($values, 0, strlen($values) - 1);

            $stmt = $this->pdo->prepare("INSERT INTO $table ($fields) VALUES ($values)");
            $stmt->execute($params);

            return $this->pdo->lastInsertId();
        }

        public function get(string $table, string $condition = "", string $selectedColumns = "*", array $paramArr = [], bool $fetchAll = false): \stdClass|array|bool
        {
            $stmt = $this->pdo->prepare("SELECT $selectedColumns FROM $table $condition ");
            $stmt->execute($paramArr);
            if ($fetchAll) {
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                $result = $stmt->fetch(PDO::FETCH_OBJ);
            }


            if ($result) {
                return $result;
            }

            return false;
        }
    }