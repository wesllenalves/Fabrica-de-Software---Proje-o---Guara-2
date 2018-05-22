<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use Core\BaseController;
use App\Models\Cadastro;
/**
 * Description of AdminController
 *
 * @author laboratorio
 */
class AdminController extends BaseController{
    
    public function index(){
//        $this->setPageTitle("Admin");
        $this->Render('admin/dashboard', 'layoutadmin');
    }
    
    public function cadastroProduto($request){
        //atribui a ua variavel todos os dados passados por post
        $dados = $request->post;
        // cria um objeto da model cadastro
        $cadastro = new Cadastro();
        //chama o metodo resposavel pelo cadastro
       if($cadastro->cadastrar($dados)){
           echo 'cadastrado';
       }else{
           echo 'não cadastrado';
       }
    }
}
