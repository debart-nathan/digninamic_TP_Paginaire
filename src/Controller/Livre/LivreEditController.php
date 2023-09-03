<?php

namespace Nath\TpPaginaire\Controller\Livre;

use Exception;
use Nath\TpPaginaire\Entity\Books;
use Nath\TpPaginaire\Kernel\AbstractController;
use Nath\TpPaginaire\Kernel\Views;
use Throwable;

class LivreEditController extends AbstractController
{
    public function handle($data)
    {
        if (isset($_POST["icbn"])) {
            $this->post($data);
        }
        $this->index($data);
    }

    public function index($data)
    {
        var_dump($data);
        $viewData = [];
        $viewData["id"] = "";
        $viewData["title"] = "Paginaire : Créer un Livre";
        if (!empty($data) && isset($data["book"])) {
            $viewData["book"] = $data["book"];
            $viewData["title"] = "Paginaire : Édité un Livre";
        }



        $this->view->render($viewData, "bookEdit.php");
    }

    public function post($data)
    {
        $postData = array(
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'image' => $_POST['image'],
            'type' => $_POST['type'],
            'description' => $_POST['description']
        );

        if (isset($data["book"])) {
            try {
                Books::update($data["book"]->getId(), $postData);
            } catch (Throwable $t) {
                $this->$this->setFlashMessage(
                    'error',
                    "Echec de l'eddition"
                );
                exit;
            }
            header('Location: /');
            $this->setFlashMessage(
                'success',
                "edition réussit"
            );
            exit;
        } else {
            $postData = array("id" => $_POST['icbn']) + $postData;
            try {
                Books::insert($postData);
            } catch (Throwable $t) {
                $this->setFlashMessage(
                    'error',
                    "Echec de l'ajout"
                );
                exit;
            }
            header('Location: /');

            $this->setFlashMessage(
                'success',
                "ajout réussit"
            );
            exit;
        }
    }
}
