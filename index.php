<?php
require_once "./vendor/autoload.php";

use Nath\TpPaginaire\Kernel\Dispatcher;

use Nath\TpPaginaire\Kernel\Model;


$model = new Model;

$dispatcher = new Dispatcher;
$dispatcher->dispatch();