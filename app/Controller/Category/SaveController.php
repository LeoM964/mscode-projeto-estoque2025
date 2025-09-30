<?php

namespace App\Controller\Category;


use App\Controller\AbstractController;
use App\Model\Category;

class SaveController extends AbstractController
{
    public function index(array $requestData): void
    {   
        $this->requireAuth();
        // var_dump($_POST, $requestData);
        // die;

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->render('/categories/create.php', );
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirectToError("Método não permitido");
        }

        if (empty($requestData['nome'])) {
            $this->redirectToError("Nome da categoria é obrigatório");
        }

        $data = [
            'nome' => trim($requestData['nome']),
            //'description' => trim($requestData['description'] ?? ''),
            //'completed' => isset($requestData['completed']) ? (int) $requestData['completed'] : 0
        ];

        $model = new Category();
        if (!empty($requestData['id'])) {
            $success = $model->update((int) $requestData['id'], $data);
        } else {
            $success = $model->create($data);
        }

        if ($success) {
            $this->redirect('/categories/read');
        } else {
            $this->redirectToError("Erro ao salvar item");
        }
    }
}