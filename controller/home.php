<?php

class ControllerHome extends Controller
{
    public function index()
    {
        $loader = new Loader($this->registry);
        $loader->view('header', array());
    }
}