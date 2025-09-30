<?php

namespace App\Controller\Produtos;

use App\Controller\AbstractController;
use App\Model\Produto;

class EditarProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {
        $produtoId = $requestData['id'];

        $model = new Produto();

        $produto = $model->buscar($produtoId);
        if (empty($produto)) {
            $this->redirect('/produtos');
            exit;
        }

        $model->editar($produto['id'], [
            'nome' => $requestData['nome'],
            'descricao' => $requestData['descricao'],
            'categoria_id' => $requestData['categoriaId'],
            'valor' => $requestData['valor'],
        ]);

        $this->redirect('/produtos');
    }
}