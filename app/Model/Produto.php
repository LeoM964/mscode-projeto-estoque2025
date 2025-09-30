<?php

namespace App\Model;

use App\Database\Query;

class Produto
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function listar(): array
    {
        return $this->query->select('produto');
    }

    public function buscar(int $id): array
    {
        return $this->query->select('produto', "id = {$id}")[0];
    }

    public function editar(int $id, array $dados): void
    {
        $this->query->update('produto', [
            'nome' => $dados['nome'],
            'descricao' => $dados['descricao'],
            'categoria_id' => $dados['categoria_id'],
            'valor' => $dados['valor'],
        ], "id = {$id}");
    }

    public function deletar(int $id): bool
    {
        return $this->query->delete('produto', "id = {$id}");
    }

    public function criar (array $dados): int|false 
    {
        return $this->query->insert('produto', 
        [
            'nome' => $dados['nome'],
            'descricao' => $dados['descricao'],
            'categoria_id' => $dados['categoria_id'],
            'quantidade_inicial' => $dados['quantidade_inicial'],
            'quantidade_disponivel' => $dados['quantidade_disponivel'],
            'valor' => $dados['valor'],
            'data_cadastro' => date('Y-m-d H:i:s')
        ]);
    }
    
}