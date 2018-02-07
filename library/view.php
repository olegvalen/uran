<?php

class View
{
    protected $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function render($tpl, $data)
    {
        $output = $this->registry->get('twig')->render($tpl, $data);
        echo $output;
    }

}