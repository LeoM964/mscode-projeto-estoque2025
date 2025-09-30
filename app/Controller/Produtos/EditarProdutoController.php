<?php

namespace App\Controller\Produtos;

use App\Controller\AbstractController;
use App\Model\Produto;
use App\Model\Category;

class EditarProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {

        $this->requireAuth();
        
        $produtoId = $requestData['id'];

        $model = new Produto();

        $produto = $model->buscar($produtoId);
        if (empty($produto)) {
            $this->redirect('/produtos');
            exit;
        }

        $catId = (int)$requestData['categoriaId'];
        $catModel = new Category();
        if(!$catModel->findById($catId)){
            $this->redirectToError('Categoria inexistente no banco de dados, escolha uma categoria cadastrada em Categorias');
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