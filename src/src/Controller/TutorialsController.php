<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TutorialsController {

    public function index(){
        
        return new Response(
            '<html><body>Bruno </body></html>'
            
        );

    }
}

