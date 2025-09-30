<?php

namespace App\Controller\Produtos;

use App\Controller\AbstractController;
use App\Model\Produto;

class ListarProdutosController extends AbstractController
{
    public function index(array $requestData): void
    {
        $model = new Produto();

        $produtos = $model->listar();

        $this->render('produtos/listar.php', ['produtos' => $produtos]);
    }
}