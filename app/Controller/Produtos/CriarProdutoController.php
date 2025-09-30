<?php

namespace App\Controller\Produtos;


use App\Controller\AbstractController;
use App\Model\Produto;
use App\Model\Category;

class CriarProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {   
        $this->requireAuth();
        // var_dump($_POST, $requestData);
        // die;

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->render('/produtos/novo_produto.php', );
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirectToError("Método não permitido");
        }
        
        if (empty($requestData['nome'])) {
            $this->redirectToError("Nome do produto é obrigatório");
        }

        if (empty($requestData['categoriaId'])) {
            $this->redirectToError('Categoria é obrigatória');
        }

        $catId = (int)$requestData['categoriaId'];
        $catModel = new Category();
        if(!$catModel->findById($catId)){
            $this->redirectToError('Categoria inexistente no banco de dados');
        }

        $data = [
            'nome' => trim($requestData['nome']),
            'descricao' => trim($requestData['descricao'] ?? ''),
            'categoria_id' => (int)($requestData['categoriaId']),
            'data_cadastro' => date('Y-m-d H:i:s'),
            'quantidade_inicial' => (int)($requestData['quantidade']?? 0),
            'quantidade_disponivel' => (int) ($requestData['quantidade'] ?? 0),
            'valor' => (int) ($requestData['valor'] ?? 0),

        ];

      

        $model = new Produto();
        $success = $model->criar($data);
        if ($success) {
            $this->redirect('/produtos');
        } else {
            $this->redirectToError("Erro ao salvar produto");
        }
    }
}