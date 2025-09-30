<?php

namespace App\Controller;

// principal, rota /

class PainelController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->requireAuth();
        $this->render('painel.php');
    }
}
