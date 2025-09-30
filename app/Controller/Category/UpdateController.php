<?php

namespace App\Controller\Category;


use App\Controller\AbstractController;
use App\Model\Category;

class UpdateController extends AbstractController
{
    public function index(array $requestData): void
    {   
        $this->requireAuth();
        // var_dump($_POST, $requestData);
        // die;


        $model = new Category();
        $categoria = $model->findById($requestData['id']);
       if(!$categoria){
        $this->redirectToError('Categoria não encontrada');
       }
      

        $this->render('/categories/update.php', $categoria);
        
      

        
       
    }
}