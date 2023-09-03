<?php

namespace Nath\TpPaginaire\Kernel;

class TemplateManager {
    public static function renderTemplate($templatePath, $viewData = []) {
        // Start output buffering
        ob_start();

        // Extract the $viewData array to variables
        extract($viewData, EXTR_SKIP);

        // Include the template file
        include $templatePath;

        // Get the contents of the buffer and end buffering
        $output = ob_get_clean();

        return $output;
    }
}
