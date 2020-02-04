<?php

/**
 * 
 * 
 * @author Bruno HUDBERT <dev@bruno.hudbert.fr>
 * 
 */
class Page
{

    public $pageContent;

    public function __construct()
    {
        $this->pageContent = "<br>";
    }

    public function render()
    {
        echo $this->pageContent;
    }
}

