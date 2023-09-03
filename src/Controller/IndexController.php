<?php

namespace Nath\TpPaginaire\Controller;

use Nath\TpPaginaire\Kernel\AbstractController;

class IndexController extends AbstractController
{

    public function index(array $pathDatas)
    {
        $this->view->setHtml('home.php');
        
        $this->view->render(["title"=>"Paginaire : Acceuil"]);
    }
}
