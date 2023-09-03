<?php
namespace Nath\TpPaginaire\Controller;

use Nath\TpPaginaire\Controller\Livre\LivreEditController;
use Nath\TpPaginaire\Entity\Books;
use Nath\TpPaginaire\Kernel\AbstractController;
use Throwable;

class LivreController extends AbstractController{
    public function handle($data){

        if (isset($data[0]) && $data[0]== "create"){
            $this->create();
            exit;
        }

        if (isset($data[1]) && $data[1]== "edit"){
            $this->edit($data);
            exit;
        }

        if (isset($data[1]) && $data[1]== "delete"){
            $this->remove($data);
            exit;
        }

        if (isset($data[0])){
            $this->index($data);
            exit;
        }

        header('Location: /');
        exit;
        

    }

    public function index($data){


        $book=Books::getById($data[0])[0];
        $viewDatas=[
            "title" => "Paginaire : ".$book->getTitle(),
            "book" => $book
        ];

        $this->view->render($viewDatas,"book.php");

    }

    public function create(){
        $lec =new Livre\LivreEditController;
        $lec->handle([]);

    }

    public function edit($data){
        $book=Books::getById($data[0])[0];
        $lec =new Livre\LivreEditController;
        $lec->handle(["book"=>$book]);


    }

    public function remove($data){
        $books=Books::getById($data[0]);
        $status=false;
        if(!empty($books)){
            try {
                Books::delete($data[0]);
                $status=true;
            }catch(Throwable $t){
                $status=false;
            }
            
        }
        
        if ($status){
            header('Location: /');
            $this->$this->setFlashMessage(
                'success',
                "suppression Effectué"
            );
            exit;
        }else{
            $this->$this->setFlashMessage(
                'error',
                "suppression échoué"
            );
            $this->index($data);
        }


    }
}
    
