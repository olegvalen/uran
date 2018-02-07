<?php

class ControllerRouter extends Controller
{
    public function index()
    {
        $get = $this->registry->get('request')->get;
        if (count($get)) {
            if (count($get) == 1) {
                //http://sites/uran/?products
                $keys = array_keys($get);
                $loader = new Loader($this->registry);
                $loader->controller(str_replace('-', '', $keys[0]), '', array());
            } elseif (count($get) == 2) {
                //http://sites/uran/?products&delete=3
                $keys = array_keys($get);
                $key = str_replace('-', '', $keys[0]);
                $method = $keys[1];
                $id = (int)$get[$method];
                $loader = new Loader($this->registry);
                $loader->controller($key, $method, array($id));
            }
        } else {
            $loader = new Loader($this->registry);
            $loader->controller('home', '', array());
        }
    }
}