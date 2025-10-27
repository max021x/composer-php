<?php

namespace Core;

use RuntimeException;

class View
{       
    public function  render (string $template , array $data = [] , string $layout = null):string {

        $content = static::renderTemplate(
            $template , 
            $data 
        ) ; 

        return static::renderLayout($layout , $data , $content) ; 

    }


    protected static function renderTemplate(string $template, array $data): string
    {

        extract($data);

        $path = "../app/Views/$template.php";

        if (!file_exists($path)) {
            throw new RuntimeException("Error: Template file not found: $path");
        }

        ob_start();
        require $path;
        return ob_get_clean();
    }

    protected static function renderLayout (?string $layout , array $data , string $content):string {

        if($template === null) {
            return $content ; 
        }

        extract([...$data , 'content' => $content]) ; 

        $path = "../app/Views/$template.php" ; 

        if(!file_exists($path)) {
            throw new RuntimeException("Error : Layout file not found: $path") ; 
        }

        ob_start() ; 
        require $path ; 
        return ob_get_clean() ; 

    }
}
