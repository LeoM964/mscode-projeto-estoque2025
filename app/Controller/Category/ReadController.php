<?php

namespace App\Controller\Category;

use App\Controller\AbstractController;
use App\Model\Category;


class ReadController extends AbstractController {

    public function index(array $requestData): void
    {
        $this->requireAuth();
        
        $model = new Category();
        $categorias = $model->findAll();

        $this->render('categories/read.php', ['categorias' => $categorias]);
    }
   
}

