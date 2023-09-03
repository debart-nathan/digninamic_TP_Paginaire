<?php

namespace Nath\TpPaginaire\Kernel;

use Nath\TpPaginaire\Kernel\Views;

abstract class AbstractController
{
    private ?string $flashMessage = null;
    protected Views $view;

    public function __construct()
    {
        $this->view = new Views;
    }

    public function handle(array $pathDatas){
        $this->index($pathDatas);
    }

    abstract public function index(array $pathDatas);

    public function getFlashMessage()
    {
        return $this->flashMessage;
    }

    public function setFlashMessage(string $message, string $type)
    {
        if ($type === 'success') {
            $this->flashMessage = "<p style='background-color: green;color: #ffffff;'>$message</p>";
            return $this;
        }
        if ($type === 'error') {
            $this->flashMessage = "<p style='background-color: red;color: #ffffff;'>$message</p>";
            return $this;
        }
        $this->flashMessage = "<p>$message</p>";
        return $this;
    }
}
