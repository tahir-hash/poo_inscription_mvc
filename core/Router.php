<?php

namespace App\Core;

use App\Exception\RouteNotFoundException;

class Router
{

    private Request $request;
    private Controller $control;
    private Session $session;

    public function __construct()
    {
        $this->request = new Request;
        $this->control = new Controller($this->request);
        $this->session = new Session;
    }

    private array $routes = [];

    public function route(string $uri, array $action)
    {
        $this->routes[$uri] = $action;
    }

    public function resolve()
    {
        $uri = "/" . $this->request->getUri()[0];
        if (isset($this->routes[$uri])) {
            $route = $this->routes[$uri];
            [$crtClass, $action] = $route;
            if (class_exists($crtClass) && method_exists($crtClass, $action)) {
                $ctrl = new $crtClass($this->request);
                // $ctrl = new SecurityController()
                // $ctrl->{$action()}; // $ctrl->authentification()
                call_user_func(array($ctrl, $action));
            } else {
                throw new RouteNotFoundException();
            }
        } else {
            //throw new RouteNotFoundException();
            $this->control->redirectToRoute('login');
        }
    }
}
