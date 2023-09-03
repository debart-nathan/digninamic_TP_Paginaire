<?php

namespace Nath\TpPaginaire\Kernel;
use Nath\TpPaginaire\Config\Config;
use Nath\TpPaginaire\Kernel\TemplateManager;

class Views
{

    private string $html;


    public function setHtml(string $html): self
    {
        $this->html = Config::VIEWS .'html/'.$html;
        return $this;
    }

    public function render(array $vars, ?string $html = null)
    {
        if ($html !== null) {
            $this->html = Config::VIEWS .'html/'.$html;
        }
        echo TemplateManager::renderTemplate($this->html,$vars);

    }
}
