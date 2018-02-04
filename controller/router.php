<?php

class ControllerRouter extends Controller
{
    public function index()
    {
        $get = $this->registry->get('request')->get;
        if (count($get)) {
            if (count($get) == 1) {
                $keys = array_keys($get);
                $key = $keys[0];
                $value = $get[$key];
                if (!empty($value)) {
                    $page = (int)$value;
                    $loader = new Loader($this->registry);
                    $loader->controller('new', array($page));
                } else {
                    $loader = new Loader($this->registry);
                    $loader->controller($key, array());
                }
            } else {
                //other params
            }
        } else {
            $loader = new Loader($this->registry);
            $loader->controller('home', array());
        }
    }
}