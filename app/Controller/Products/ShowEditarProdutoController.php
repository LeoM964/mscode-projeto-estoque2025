<?php

namespace App\Controller\Produtos;

use App\Controller\AbstractController;
use App\Model\Produto;
use App\Model\Category;

class ShowEditarProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {
        $produtoId = $requestData['id'];
        $model = new Produto();

        $produto = $model->buscar($produtoId);

        $this->render('produtos/editar.php', ['produto' => $produto]);
    }
}