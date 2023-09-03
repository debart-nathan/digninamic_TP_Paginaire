<?php

namespace Nath\TpPaginaire\Controller;

use Nath\TpPaginaire\Kernel\AbstractController;
use Nath\TpPaginaire\Entity\Books;

class LivresController extends AbstractController
{

    
    public function index(array $pathDatas)
    {
        $page =1;

        //check if page is in query sting
        if(isset($_GET["page"])){
            $page = $_GET["page"];
        }


        // get Books for the page
        $bookList = Books::getAll((($page-1)*10).", 10");

        $this->view->setHtml('booksList.php');
        
        
        $viewDatas = [
            'title' => "Paginaire: Liste Livres",
            'books' => $bookList,
            'page' =>$page

        ];
        $this->view->render($viewDatas);
    }
}
