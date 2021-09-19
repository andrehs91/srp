<?php

namespace Controller;

use Throwable;

class Router
{
    private string $resource;
    
    public function __construct(string $requestUri)
    {
        $this->resource = explode('?', str_replace("/", "", $requestUri))[0];
    }
    
    public function getRoute(): string
    {
        if ($this->resource === "") {
            $this->redirect("pagina-inicial");
            exit;
        }
        
        $controllerName = "Page";
        $partsOfControllerName = explode("-", $this->resource);
        foreach ($partsOfControllerName as $part) {
            $controllerName .= ucfirst($part);
        }
        return $controllerName;
    }
    
    public function getResource(): string
    {
        return $this->resource;
    }
    
    public function redirect(string $page): void
    {
        require "../Source/View/Templates/header.php";
        require "../Source/View/$page.php";
        require "../Source/View/Templates/footer.php";
    }
}
