<?php

namespace App\Model;

use App\Database\Query;

class Usuario
{
    private Query $query;

    public function __construct()
    {
        $this->query = new \App\Database\Query();
    }

    public function findById(int $id): ?array
    {
        $result = $this->query->select('usuario', 'id = ' . $id);

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function create(array $data): int|false
    {
        return $this->query->insert('usuario', [
            'title' => $data['title'],
            'description' => $data['description'] ?? '',
            'completed' => $data['completed'] ?? false
        ]);
    }

    public function update(int $id, array $data): bool
    {
        return $this->query->update('usuario', [
            'title' => $data['title'],
            'description' => $data['description'] ?? '',
            'completed' => $data['completed'] ?? false
        ], 'id = ' . $id);
    }

    public function delete(int $id): bool
    {
        return $this->query->delete('usuario', 'id = ' . $id);
    }


    public function findByEmail(string $email): ?array
    {
        $result = $this->query->select('usuario', 'email = "' . $email . '"');

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }
    public function findAll(): array
    {
        return $this->query->select('usuario', null) ?: [];
    }
}