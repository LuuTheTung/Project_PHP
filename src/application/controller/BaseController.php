<?php
class BaseController
{
    public static function render($file, $data = array())
    {

        $view_file = 'view/' . $file . '.php';
        if (is_file($view_file)) {
            extract($data);
            ob_start();
            require_once($view_file);
            $content = ob_get_clean();
            require_once('view/application.php');
        }
    }
    public static function home()
    {
        BaseController::render('homePage');
    }
    public static function about()
    {
        BaseController::render('about');
    }
    public static function termOfService()
    {
        BaseController::render('termOfService');
    }
}
