<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use Core\BaseController;
use App\Models\Admin\CadastroProduto;
use App\Models\Admin\CadastroFuncionario;
use App\Models\Admin\ListarClientes;
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
    
    public function funcionario(){
        $this->Render('admin/cadastrar-funcionario');
    }


    public function cadastroFuncionario($request){
        
        $cadastroFuncionario = new CadastroFuncionario();
        
        if($cadastroFuncionario->cadastrar($request->post)){
         
        }
    }

    public function cadastroProduto($request){
        //atribui a ua variavel todos os dados passados por post
        $dados = $request->post;
        // cria um objeto da model cadastro
        $cadastro = new CadastroProduto();
        //chama o metodo resposavel pelo cadastro
       if($cadastro->cadastrar($dados)){ 
           //1 = erro
           //2 = sucess
           $this->redirect('dashboard', '2', 'cadastrado com sucesso');
       }else{
           echo 'não cadastrado';
       }
    }
    
    public function listarCliente(){
        $cliente = new ListarClientes();
       $this->view->clientes = $cliente->listar();
        
        
        $this->Render("admin/lista-cliente");
    }
    
    public function editarCliente($id){
        
      echo  $id;
    }
    
}
