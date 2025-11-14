<?php

namespace Core;

use RuntimeException;

class View
{
    protected static $globals  = [] ; 

    public static function share (string $key , mixed $value): void {
        static::$globals[$key]  = $value ; 
    }

    public static function render(string $template, array $data = [], string $layout = null): string
    {
        $data = [...static::$globals , ...$data] ; 
        $content = static::renderTemplate($template, $data);
        return static::renderLayout($layout, $data, $content);
    }

    public static function partial(string $template , array $data = []):string {
        return static::renderTemplate("partials/$template" , $data) ; 
    }

    private static function renderTemplate(string $template, array $data): string
    {
        extract($data);

        $path = "../app/Views/$template";

        if (!file_exists($path)) {
            return throw new RuntimeException("Error File Does Not Exists : $path");
        }

        ob_start();
        require $path;
        return ob_get_clean();
    }

    private static function renderLayout(string $template, array $data, string $content)
    {
        if ($content !== null) {
            extract([...$data, 'content' => $content]);
        }

        $path = "../app/Views/$template";

        if (!file_exists($path)) {
            return throw new RuntimeException("Error File Does Not Exists : $path");
        }

        ob_start();
        require $path;
        return ob_get_clean();
    }
}
