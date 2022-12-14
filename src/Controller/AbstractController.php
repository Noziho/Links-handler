<?php

namespace App\Controller;
abstract class AbstractController
{
    abstract public function index();

    /**
     * @param string $template
     * @param array $data
     * @return void
     * Render function for printing View.
     */
    public static function render(string $template, array $data = []): void
    {
        ob_start();
        require __DIR__ . "/../../View/" . $template . ".html.php";
        $html = ob_get_clean();
        require __DIR__ . "/../../View/base.html.php";
    }

    public static function formIsset(...$inputNames): bool
    {
        foreach ($inputNames as $name) {
            if (!isset($_POST[$name]) || empty($_POST[$name])) {
                return false;
            }
        }
        return true;
    }

    public static function checkRange(string $value, int $min, int $max, string $redirect, string $errorMessage): void
    {
        if (strlen($value) < $min || strlen($value) > $max) {
            $_SESSION['error'] .= $errorMessage;
            header("Location: " . $redirect);
            exit();
        }
    }

}