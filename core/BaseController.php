<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

use Core\Session;
use Core\FlashMessage;

/**
 * Description of BaseController
 *
 * @author Wesllen
 */
class BaseController {

    protected $view;
    private $viewPath;
    private $layoutPath;
    private $pageTitle;
    private $redirect;
    private $tipo;
    private $extencao;
    private $mensagem;
    //protected $session;
    
    # Enumerados
    const SUCCESS = 1;
    const INFO = 2;
    const WARNING = 3;
    const DANGER = 4;

    public function __construct() {
        $this->view = new \stdClass();
       // $this->session = Session::getInstance();
    }

    protected function Render($view, $layoutPath = null, $extencao = null) {
        $this->viewPath = $view;
        $this->layoutPath = $layoutPath;
        $this->extencao = $extencao;
        //Se existir layout passa o caminho dele caso contrario passa so o caminho do arquivo da view
        if ($layoutPath) {
            $this->layout();
        } else {
            $this->content();
        }
    }
    
    protected function alerta(){        
        if(isset($_SESSION['success'])){
            echo "<div class='row'> 
                    <div class='col-xs-12 col-md-12'>
                        <div class='alert alert-success' role='alert'>{$_SESSION['success']}</div>
                    </div>
                </div>";          
                unset($_SESSION['success']);
        }
        
        if(isset($_SESSION['info'])){
            echo "<div class='row'> 
                    <div class='col-xs-12 col-md-12'>
                        <div class='alert alert-info' role='alert'>{$_SESSION['info']}</div>
                    </div>
                </div>";          
                unset($_SESSION['info']);
        }
        
         if(isset($_SESSION['danger'])){
           echo "<div class='row'>
               <div class='col-xs-12 col-md-12'>
                   <div class='alert alert-danger' role='alert'>";
            foreach ($_SESSION['danger'] as $sessao ){
                   echo "{$sessao}<br>";
                }
                echo '</div></div>
               </div>';          
            unset($_SESSION['danger']);          
        }
    }

    protected function content() {
        $ext = empty($this->extenção) ? ".phtml" : ".". $this->extenção;
        if (file_exists(__DIR__ . "/../app/Views/{$this->viewPath}{$ext}")) {
            require_once __DIR__ . "/../app/Views/{$this->viewPath}{$ext}";
        } else {          
            Container::pageNotFoundView();
        }
    }

    protected function layout() {
        if (file_exists(__DIR__ . "/../app/Views/tamplate/{$this->layoutPath}.phtml")) {
            require_once __DIR__ . "/../app/Views/tamplate/{$this->layoutPath}.phtml";
        } else {
            Container::pageNotFoundLayout();
        }
    }

    protected function setPageTitle($pageTitle) {
        $this->pageTitle = $pageTitle;
    }

    protected function getPageTitle($separator = null) {
        if ($separator) {
            return $this->pageTitle . " " . $separator . " ";
        } else {
            return $this->pageTitle;
        }
    }

    protected function redirect($redirect, $tipo = null, $mensagem = null) {
        $this->redirect = $redirect;
        $this->setSessionMessage($tipo, $mensagem);
        $this->getRedirect() === TRUE ?: Container::pageNotFoundLayout();
        exit;
    }
    
    protected function setSessionMessage($tipo, $mensagem) {
        $this->tipo = $tipo;
        $this->mensagem = $mensagem;
        $this->setSession();
    }

    protected function getRedirect() {
        header('Location:' . base_url('/') . '' . $this->redirect);
        return TRUE;
    }

    
    protected function setSession() {
      //fornece qual sera o nome da sessao e sua mensagem
      switch ($this->tipo) {
          case 1: $this->session->success = $this->mensagem;
              break;
          case 2: $this->session->info = $this->mensagem;
              break;
          case 3: $this->session->warning = $this->mensagem;
              break;
          case 4: $this->session->danger = $this->mensagem;
              break;
      }
    }    
    

}
