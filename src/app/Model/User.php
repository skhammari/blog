<?php

    namespace App\Model;

    class User extends Model
    {
        public function create(string $username, string $password): int
        {
            return $this->db->insert('users', [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
        }

        public static function findById(int $id): \stdClass|bool
        {
            return (new static())->db->get('users', 'where id = ?', 'id, username', [$id], false);
        }
    }