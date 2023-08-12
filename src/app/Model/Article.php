<?php

    namespace App\Model;

    use App\Core\Exception\UserNotFoundException;

    class Article extends Model
    {
        public static function getAll(): array|bool
        {
            return (new static())->db->get('articles', '', 'id, authorId, title, image, body, createAt', [], true);
        }

        public static function find(int $id): \stdClass|bool
        {
            return (new static())->db->get('articles', 'where id = ?', 'id, authorId, title, image, body, createAt', [$id], false);
        }

        public function create(int $authorId, string $title, string $body): int|bool
        {
            $user = User::findById($authorId);
            if (!$user) {
                throw new UserNotFoundException();
            }

            if (!$title) {
                throw new \InvalidArgumentException();
            }

            if (!$body) {
                throw new \InvalidArgumentException();
            }

            return $this->db->insert('articles', [
                'authorId' => $user->id,
                'title'    => $title,
                'body'     => $body
            ]);
        }
    }