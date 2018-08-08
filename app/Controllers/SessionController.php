<?php
namespace App\Controllers;

use Core\BaseController;

class SessionController extends BaseController {


    public function index() {
        
            $this->Render('JSON_Menssagens/index', 'layoutHome');
    
    }
}
?>