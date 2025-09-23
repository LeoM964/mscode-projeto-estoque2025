<?php

namespace App\Model;

use App\Database\Query;

class Category
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function findById(int $id): ?array
    {
        $result = $this->query->select('categorias', 'id = ' . $id);

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function create(array $data): int|false
    {
        // var_dump($data);
        // die;
        return $this->query->insert('categorias', [
            'nome' => $data['nome'],
           // 'description' => $data['description'] ?? '',
            //'completed' => $data['completed'] ?? false
        ]);
    }

    public function update(int $id, array $data): bool
    {
        return $this->query->update('categorias', [
            'nome' => $data['nome'],
           //'description' => $data['description'] ?? '',
          // 'completed' => $data['completed'] ?? false
        ], 'id = ' . $id);
    }

    
    public function delete(int $id): bool
    {
        return $this->query->delete('categorias', 'id = ' . $id);
    }

    public function findAll(): array
    {
        return $this->query->select('categorias', null) ?: [];
    }
}