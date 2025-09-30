<?php

namespace App\Controller\Category;

use App\Controller\AbstractController;
use App\Model\Category;

class DeleteController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->requireAuth();
        
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            $this->redirectToError('Método não permitido');
        }
        
        if (empty($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $categoryModel = new Category();
        $success = $categoryModel->delete((int) $requestData['id']);

        if ($success) {
            $this->redirect('/categories/read');
        } else {
            $this->redirectToError("Erro ao excluir categoria");
        }
    }
}

