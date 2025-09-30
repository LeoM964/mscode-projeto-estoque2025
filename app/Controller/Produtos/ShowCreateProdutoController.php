<?php

namespace App\Controller\Produtos;

use App\Controller\AbstractController;
use App\Model\Produto;

// principal, rota /

class ShowCreateProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->requireAuth();
        
        $this->render('/produtos/novo_produto.php');
    }
}