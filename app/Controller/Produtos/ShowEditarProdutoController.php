<?php

namespace App\Controller\Produtos;

use App\Controller\AbstractController;
use App\Model\Produto;
use App\Model\Category;

class ShowEditarProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->requireAuth();

        $produtoId = $requestData['id'] ?? null;
        if (empty($produtoId)){
            $this->redirect('/produtos');
            return;
        }
        $produtoModel = new Produto();
        $produto = $produtoModel->buscar($produtoId);

        if (empty($produto)){
            $this->redirect('/produtos');
            return;
        }
        $categoriaModel = new Category;
        $categorias = $categoriaModel->findAll();

        $this->render('produtos/editar.php', [
            'produto' => $produto,
            'categorias' =>$categorias
    ]);
    }
}