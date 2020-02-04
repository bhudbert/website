<?php

namespace App\controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController {

    public function index(){
        
        return new Response(
            '<html><body>Bruno </body></html>'
        );

    }
}

