<?php

class Loader
{

    protected $registry;
    protected $method = 'index';

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function model($path, $method, $args)
    {
        $result = array();
        $file = DIR_APPLICATION . 'model/' . strtolower($path) . '.php';
        $class = 'Model' . ucfirst($path);
        if (is_file($file)) {
            include_once($file);
            $model = new $class($this->registry);
            $result = call_user_func_array(array($model, empty($this->method) ? $this->method : $method), $args);
        }
        return $result;
    }

    public function view($path, $args)
    {
        if (file_exists('view/tpl/' . strtolower($path) . '.twig')) {
            $this->registry->get('view')->render(strtolower($path) . '.twig', $args);
        }
    }

    public function controller($path, $method, $args)
    {
        if (!empty($method)) $this->method = $method;
        $file = DIR_APPLICATION . 'controller/' . strtolower($path) . '.php';
        $class = 'Controller' . ucfirst($path);
        if (is_file($file)) {
            include_once($file);
            $controller = new $class($this->registry);
            call_user_func_array(array($controller, $this->method), $args);
        }
    }
}
