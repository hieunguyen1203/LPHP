<?php
namespace MVC;


use Matrix\Exception;
use MVC\Controllers\ErrorController;

class Router
{
    public function redirectRouter()
    {
        $controllerName = $_REQUEST['controller'] ? $_REQUEST['controller'] : 'index';
        $controllerName = "\MVC\Controllers\\". ucfirst($controllerName). 'Controller';

        if(class_exists($controllerName))  {
            $controllerObject = new $controllerName;
            $actionName = $_REQUEST['action'] ? $_REQUEST['action'] : 'index';
            $actionName .= 'Action';
            if(method_exists($controllerName, $actionName)) {
                $controllerObject->$actionName();
                return;
            }
        }
        $controllerObject = new ErrorController();
        $controllerObject->notFoundAction();
        exit;
    }

}
