<?php

namespace Nath\TpPaginaire\Kernel;

use Nath\TpPaginaire\Kernel\AbstractController;

class StaticFileController extends AbstractController
{
    public function handle($params)
    {
        $this->index($params);
    }

    public function index($params)
    {
        $staticFilePath = $_SERVER['REQUEST_URI'];

        if (file_exists($staticFilePath)) {
            $this->returnStaticFile($staticFilePath);
        } else {
            $this->handleFileNotFound();
        }
    }

    private function returnStaticFile($filepath)
    {
        $extensionToMimeType = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            // add more mappings as needed
        ];

        $extension = pathinfo($filepath, PATHINFO_EXTENSION);
        if (isset($extensionToMimeType[$extension])) {
            $mimeType = $extensionToMimeType[$extension];
        } else {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $filepath);
            finfo_close($finfo);
        }

        header('Content-Type: ' . $mimeType);
        readfile($filepath);
    }

    private function handleFileNotFound()
    {
        // Set the HTTP response status code to 404
        http_response_code(404);
    }
}
