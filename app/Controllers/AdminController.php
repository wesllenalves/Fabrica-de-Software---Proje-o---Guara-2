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
use Core\Validator;
use Core\Session;
/**
 * Description of AdminController
 *
 * @author laboratorio
 */
class AdminController extends BaseController{
    private $Cliente;
    private $Produto;
    private $Funcionario;
    
    public function __construct() {
        $this->Cliente = new Cliente();
        $this->Produto = new CadastroProduto();
        $this->Funcionario =  new CadastroFuncionario();
    }

        public function index(){
//        $this->setPageTitle("Admin");
        $this->Render('admin/dashboard', 'layoutadmin');
    }
    
    public function funcionario(){
        $this->Render('admin/cadastrar-funcionario');
    }


    public function cadastroFuncionario($request){       

        if($this->Funcionario->cadastrar($request->post)){
         
        }
    }

    public function cadastroProduto($request){
        //atribui a ua variavel todos os dados passados por post
        $dados = $request->post;
        //chama o metodo resposavel pelo cadastro
       if($this->Produto->cadastrar($dados)){ 
           
            //1 = erro
           //2 = sucess
          $this->redirect('dashboard', '2', 'cadastrado com sucesso');
       }else{
           echo 'não cadastrado';
       }
    }
    
    public function listarCliente(){
        
       $this->view->clientes = $this->Cliente->listarAll();    
       $this->Render("admin/lista-cliente");
    }
    
    public function editarCliente($id){
        
        $clientesEditar = $this->Cliente->listarWhere($id);        
        $this->view->clientesEditar = $clientesEditar;
        $this->Render("admin/editar-clientes");
    }
    
    public function updateCliente($request){
        $id = $request->post->id;
        
        
        $data = [
            'nome' => $request->post->nome, 'cpf' => $request->post->cpf, 'senha' => $request->post->senha, 
            'confirmaSenha' => $request->post->confirmaSenha, 'tipoCliente' => $request->post->tipoCliente,
            'email' => $request->post->email, 'login' => $request->post->login, 'cidade' => $request->post->cidade,
            'cep' => $request->post->cep, 'endereco' => $request->post->endereco, 'uf' => $request->post->uf,
            'complemento' => $request->post->complemento
        ];
        
        $rules = [
            'nome' => 'required', 'cpf' => 'required', 'email' => 'required', 'login' => 'required', 
            'senha' => 'required|min:6', 'confirmaSenha' => 'required|min:6', 'tipoCliente' => 'required',
            'cidade' => 'required', 'cep' => 'required', 'endereco' => 'required', 'uf' => 'required',
            'complemento' => 'required'
        ];
       
        
        if(Validator::make($data, $rules)){
        $this->redirect("dashboard/alterar/cliente/{$id}");
        }
        
//        $dados = $request->post;        
//        if($this->Cliente->atualizar($dados)){
//            $this->redirect('dashboard/listar/clientes', '2', 'Atualizado com sucesso');
//        } else {
//            $this->redirect('dashboard/listar/clientes', '4', 'Erro ao tentar atualizar');
//        }
        
    }
    
    public function deleteCliente($id){       
        
        if($this->Cliente->deletar($id)){
            $this->redirect('dashboard/listar/clientes', '3', 'cadastrado Deletado');
        }else{
            $this->redirect('dashboard/listar/clientes', '4', 'Erro ao tentar deletar cadastro');
        }
    }
    
}
