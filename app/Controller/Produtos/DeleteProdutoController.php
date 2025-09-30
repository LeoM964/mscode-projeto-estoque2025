<?php

namespace App\Controller\Produtos;

use App\Controller\AbstractController;
use App\Model\Produto;

class DeleteProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->requireAuth();
        
        if (empty($requestData['id'])){
            $this->redirectToError('ID do produto não informado');
        }

        $model = new Produto();
        $success = $model->deletar((int)$requestData['id']);

        if($success){
            $this->redirect('/produtos');
        }else{
            $this->redirectToError('Erro ao excluir o produto');
        }

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