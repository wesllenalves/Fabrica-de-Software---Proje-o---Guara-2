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

use App\Models\Cliente;
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
        $cliente = new Cliente();
       $this->view->clientes = $cliente->listarAll();
        
        
        $this->Render("admin/lista-cliente");
    }
    
    public function editarCliente($id){
        $editar = new Cliente();
        $clientesEditar = $editar->listarWhere($id);
        
        $this->view->clientesEditar = $clientesEditar;
        $this->Render("admin/editar-clientes");
    }
    
    public function updateCliente($request){        
       
        $dados = $request->post;
        $update = new Cliente();
        if($update->atualizar($dados)){
            $this->redirect('dashboard/listar/clientes', '2', 'cadastrado com sucesso');
        } else {
            $this->redirect('dashboard/listar/clientes', '4', 'Erro ao tentar atualizar');
        }
        
    }
    
    public function deleteCliente($id){
        
       
        $deletar = new Cliente();
        if($deletar->deletar($id)){
            $this->redirect('dashboard/listar/clientes', '3', 'cadastrado Deletado');
        }else{
            $this->redirect('dashboard/listar/clientes', '4', 'Erro ao tentar deletar cadastro');
        }
    }
    
}
