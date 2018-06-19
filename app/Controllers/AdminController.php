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
use App\Models\Admin\CadastroCliente;
use App\Models\Admin\cadastroServico;
use App\Models\Admin\Os;
use App\Models\Admin\Lancamentos;
use Core\Validator;

/**
 * Description of AdminController
 *
 * @author laboratorio
 */
class AdminController extends BaseController {

    private $Clientes;
    private $Produto;
    private $Funcionario;
    private $Servico;
    private $os;
    private $lancamentos;

    public function __construct() {
        $this->Clientes = new CadastroCliente();
        $this->Produto = new CadastroProduto();
        $this->Funcionario = new CadastroFuncionario();
        $this->Servico = new cadastroServico();
        $this->os =  new Os();
        $this->lancamentos =  new Lancamentos();        
    }

    public function index() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/index', 'layoutadminMapos');
    }

    public function clientes() {
//        $this->setPageTitle("Admin");
        $dados = $this->Clientes->read("*");
        @$this->view->clientes = $dados;

        $this->Render('admin/mapos/clientes/clientes', 'layoutadminMapos');
    }

    public function clientesVisualizar($request) {
        $this->setPageTitle("Admin");
        $id = $request->get->id;
        $dados = $this->Clientes->read("*", "idClientes = $id");
        @$this->view->oneClientes = $dados;

        $this->Render('admin/mapos/clientes/vizualizarCliente', 'layoutadminMapos');
    }

    public function clientesAdicionar() {
//        $this->setPageTitle("Admin");

        $this->Render('admin/mapos/clientes/addCliente', 'layoutadminMapos');
    }
    
    public function clientesAdicionarSalvar($request) {
        $data = [
            'nomeCliente' => $request->post->nomeCliente, 'documento' => $request->post->documento,
            'pessoa' => $request->post->pessoa, 'telefone' => $request->post->telefone,  'ddd_celular' => $request->post->ddd_celular,
            'celular' => $request->post->celular, 'email' => $request->post->email, 'rua' => $request->post->rua, 'numero' => $request->post->numero,
            'bairro' => $request->post->bairro, 'cidade' => $request->post->cidade, 'estado' => $request->post->estado,  'cep' => $request->post->cep, 
        ];

        $rules = [
            'nomeCliente' => 'required', 'documento' => 'required', 'pessoa' => 'required', 'telefone' => 'required',
            'ddd_celular' => 'required', 'celular' => 'required', 'email' => 'required', 'rua' => 'required', 'numero' => 'required',
            'bairro' => 'required', 'cidade' => 'required', 'estado' => 'required', 'cep' => 'required'
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("clientes/adicionar");
        } else {

            if ($this->Clientes->cadastrar($request)) {
                $this->redirect("clientes", "1", "Cadstrado com sucesso");
                exit();
            } else {
                
            }
        }
    }

    public function clientesEditar($request) {
//        $this->setPageTitle("Admin");
        $id = $request->get->id;
        $dados = $this->Clientes->read("*", "idClientes = $id");
        @$this->view->oneClientes = $dados;
        $this->Render('admin/mapos/clientes/editCliente', 'layoutadminMapos');
    }
    
    public function clientesEditarSalvar($request) {
        $id = $request->post->idClientes; 
        
        $data = [
            'nomeCliente' => $request->post->nomeCliente, 'documento' => $request->post->documento,
            'pessoa' => $request->post->pessoa, 'telefone' => $request->post->telefone,  'ddd_celular' => $request->post->ddd_celular,
            'celular' => $request->post->celular, 'email' => $request->post->email, 'rua' => $request->post->rua, 'numero' => $request->post->numero,
            'bairro' => $request->post->bairro, 'cidade' => $request->post->cidade, 'estado' => $request->post->estado,  'cep' => $request->post->cep, 
        ];

        $rules = [
            'nomeCliente' => 'required', 'documento' => 'required', 'pessoa' => 'required', 'telefone' => 'required',
            'ddd_celular' => 'required', 'celular' => 'required', 'email' => 'required', 'rua' => 'required', 'numero' => 'required',
            'bairro' => 'required', 'cidade' => 'required', 'estado' => 'required', 'cep' => 'required'
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("clientes/editar?id={$id}");
        } else {
            if($this->Clientes->atualizar($request)){
               $this->redirect("clientes", "1", "Editado com sucesso"); 
            }else{
               $this->redirect("clientes", "4", " POS Erro ao editar cliente");  
            }
        }
    }

    public function clientesRemover($request) {
        $id = $request->get->id;    
        
        if($this->Clientes->deletar($id)){
            $this->redirect("clientes", "1", "Deletado com sucesso"); 
        }else{
            $this->redirect("clientes", "4", " POS Erro ao deletar cliente");  
        }
        
    }    

    public function produtos() {
//        $this->setPageTitle("Admin");
        $produtos = new CadastroProduto();
        $dados = $produtos->read();
        @$this->view->produtos = $dados;
        $this->Render('admin/mapos/produtos/produtos', 'layoutadminMapos');
    }

    public function produtosVisualizar($request) {
        $id = $request->get->id;

//        $this->setPageTitle("Admin");
        $produtos = new CadastroProduto();
        $dados = $produtos->read("*", "idProduto = $id");

        @$this->view->produtos1 = $dados;
        $this->Render('admin/mapos/produtos/visualizarProdutos', 'layoutadminMapos');
    }

    public function produtosEditar($request) {
         $id = $request->get->id; 
         $dados = $this->Produto->read("*", "idProduto = $id");
        @$this->view->oneProdutos = $dados;   
        $this->Render('admin/mapos/produtos/editProdutos', 'layoutadminMapos');
    }
    
    public function produtosEditarSalvar($request) {
        
         $data = [
            'nome' => $request->post->descricao, 'unidade' => $request->post->unidade, 'precoCompra' => $request->post->precoCompra,
            'precoVenda' => $request->post->precoVenda, 'estoque' => $request->post->estoque,
            'estoqueMinimo' => $request->post->estoqueMinimo
        ];

        $rules = [
            'descricao' => 'required', 'unidade' => 'required', 'precoCompra' => 'required', 'precoVenda' => 'required',
            'estoque' => 'required', 'estoqueMinimo' => 'required'
        ];
        
        if (Validator::make($data, $rules)) {
            $this->redirect("produtos");
        } else {
             if($this->Produto->atualizar($request)){
               $this->redirect("produtos", "1", "Editado com sucesso"); 
            }else{
               $this->redirect("produtos", "4", " POS Erro ao editar cliente");  
            }
        }
         
    }

    public function produtosAdicionar() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/produtos/addProdutos', 'layoutadminMapos');
    }

    public function produtosSalvar($request) {
        //$this->setPageTitle("Admin");
        $data = [
            'nome' => $request->post->descricao, 'unidade' => $request->post->unidade, 'precoCompra' => $request->post->precoCompra,
            'precoVenda' => $request->post->precoVenda, 'estoque' => $request->post->estoque,
            'estoqueMinimo' => $request->post->estoqueMinimo, 'validade' => $request->post->validade
        ];

        $rules = [
            'descricao' => 'required', 'unidade' => 'required', 'precoCompra' => 'required', 'precoVenda' => 'required',
            'estoque' => 'required', 'estoqueMinimo' => 'required', 'validade' => 'required'
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("produtos");
        } else {
            $cadastro = new CadastroProduto();
            if ($cadastro->cadastrar($request)) {
                $this->redirect("produtos", "1", "Produto Cadastrado com Sucesso");
            } else {
                $this->redirect("produtos", "4", "Algo deu errado ao tentar cadastrar produtos");
            }
        }
    }
    public function produtosRemover($request) {
        $id = $request->get->id; 
                
        if($this->Produto->deletar($id)){
            $this->redirect("produtos", "1", "Deletado com sucesso"); 
        }else{
            $this->redirect("produtos", "4", " POS Erro ao deletar cliente");  
        }
        
    }

    public function servicos() {
        $servico = new cadastroServico();
        $dados = $servico->read("*");
        @$this->view->servicos = $dados;

        $this->Render('admin/mapos/servicos/servicos', 'layoutadminMapos');
    }

    public function servicosAdicionar() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/servicos/addServico', 'layoutadminMapos');
    }

    public function servicosSalvar($request) {
        $data = [
            'nome' => $request->post->nome, 'descricao' => $request->post->descricao, 'preco' => $request->post->preco
        ];

        $rules = [
            'nome' => 'required', 'descricao' => 'required', 'preco' => 'required'
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("servicos");
        } else {
            $servico = new cadastroServico();
            if ($servico->cadastrar($request)) {
                $this->redirect("servicos", "1", "Servicos Cadastrado com Sucesso");
            } else {
                $this->redirect("servicos", "4", "Ocorreu um erro ao tentar cadastar Servicos");
            }
        }
    }

    public function servicosEditar($request) {
        $id = $request->get->id;
        $dados = $this->Servico->read("*", "idServicos = $id");
        @$this->view->oneServico = $dados;
        $this->Render('admin/mapos/servicos/editServicos', 'layoutadminMapos');
    }

    public function servicosUpdate($request) {
        $data = [
            'nome' => $request->post->nome, 'descricao' => $request->post->descricao, 'preco' => $request->post->preco
        ];

        $rules = [
            'nome' => 'required', 'descricao' => 'required', 'preco' => 'required'
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("servicos");
        } else {
            if($this->Servico->atualizar($request)){
                $this->redirect("servicos", "1", "Servicos Editado com Sucesso");
            }else{
                $this->redirect("servicos", "4", "Ocorreu um erro ao tentar Editar Servicos");
            }
        }
        
    }
    public function servicosRemover($request) {
        $id = $request->get->id; 
                
        if($this->Servico->deletar($id)){
            $this->redirect("servicos", "1", "Deletado com sucesso"); 
        }else{
            $this->redirect("servicos", "4", " POS Erro ao deletar cliente");  
        }
        
    }

    public function os() {
//        $this->setPageTitle("Admin");
        $dados = $this->os->read("*");
        @$this->view->os = $dados;
        $this->Render('admin/mapos/os/os', 'layoutadminMapos');
    }

    public function osAdicionar() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/os/addOs', 'layoutadminMapos');
    }
    public function osAdicionarSalvar($request) {
        $dados = $request->post;
        //print_r($dados); die();
        $data = [
            'nome' => $request->post->nome, 'usuarios_id' => $request->post->funcionario,
            'status' => $request->post->status, 'dataInicial' => $request->post->dataInicial,
            'telefone' => $request->post->telefone,'quantidade' => $request->post->quantidade,
            'cidade' => $request->post->cidade,'produtos' => $request->post->produtos,
            'descricaoServico' => $request->post->descricaoServico
        ];

        $rules = [
            'nome' => 'required', 'usuarios_id' => 'required', 'status' => 'required', 'dataInicial' => 'required',
            'telefone' => 'required', 'quantidade' => 'required', 'cidade' => 'required', 'descricaoServico' => 'required'
            
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("os/adicionar");
        } else {
            if ($id = $this->os->cadastrar($request)) {
                $this->redirect("os/editar?id=$id", "1", "OS Cadastrado com Sucesso");
            } else {
                $this->redirect("os", "4", "Ocorreu um erro ao tentar cadastar OS");
            }
            
        }
    }
    
    public function osVisualizar() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/os/visualizarOs', 'layoutadminMapos');
    }
    
    public function osEditar($request) {
          $id = $request->get->id;
          $dados = $this->os->read("*", "idOs = $id");
        @$this->view->oneOs = $dados;
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/os/editOs', 'layoutadminMapos');
    }
    
    public function osRemover($request) {
        $id = $request->get->id;    
        
        if($this->os->deletar($id)){
            $this->redirect("os", "1", "Deletado com sucesso"); 
        }else{
            $this->redirect("os", "4", " POS Erro ao deletar cliente");  
        }
        
    }


    
    public function financeiroLancamentos() {
//        $this->setPageTitle("Admin");
        $dados = $this->lancamentos->read("*");
        @$this->view->Lancamentos = $dados;
        $this->Render('admin/mapos/financeiro/lancamentos', 'layoutadminMapos');
    }
    
    public function adicionarReceita($request) {
        $data = [
            'descricao' => $request->post->descricao, 'valor' => $request->post->valor, 'data_vencimento' => $request->post->vencimento
        ];

        $rules = [
            'nome' => 'required', 'valor' => 'required', 'data_vencimento' => 'required'
            
        ];
        if (Validator::make($data, $rules)) {
            $this->redirect("financeiro/lancamentos");
        } else {
            if ($id = $this->lancamentos->cadastrar($request)) {
                $this->redirect("financeiro/lancamentos", "1", "OS Cadastrado com Sucesso");
            } else {
                $this->redirect("financeiro/lancamentos", "4", "Ocorreu um erro ao tentar cadastar OS");
            }
            
        }
    }
    public function adicionarDespesa($request) {
        $data = [
            'descricao' => $request->post->descricao, 'valor' => $request->post->valor, 'data_vencimento' => $request->post->vencimento
        ];

        $rules = [
            'nome' => 'required', 'valor' => 'required', 'data_vencimento' => 'required'
            
        ];
        if (Validator::make($data, $rules)) {
            $this->redirect("financeiro/lancamentos");
        } else {
            if ($id = $this->lancamentos->cadastrar($request)) {
                $this->redirect("financeiro/lancamentos", "1", "OS Cadastrado com Sucesso");
            } else {
                $this->redirect("financeiro/lancamentos", "4", "Ocorreu um erro ao tentar cadastar OS");
            }
            
        }
    }
    
    
    public function financeiroLancamentosEditar($request) {
        $id = $request->get->id;
        $dados = $this->lancamentos->read("*", "idLancamentos = $id");
        @$this->view->oneLancamentEdit = $dados;
    }
    public function lacamentosRemover($request) {
        $id = $request->get->id;
        if($this->lancamentos->deletar($id)){
            $this->redirect("financeiro/lancamentos", "1", "Deletado com sucesso"); 
        }else{
            $this->redirect("financeiro/lancamentos", "4", " POS Erro ao deletar cliente");  
        }
    }
    
    

    public function Relatorios() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/index', 'layoutadminMapos');
    }

    public function configuracoes() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/index', 'layoutadminMapos');
    }

//    public function funcionario(){
//        $this->Render('admin/cadastrar-funcionario');
//    }
//
//
//    public function cadastroFuncionario($request){       
//
//        if($this->Funcionario->cadastrar($request->post)){
//         
//        }
//    }
//
//    public function cadastroProduto($request){
//        //atribui a ua variavel todos os dados passados por post
//        $dados = $request->post;
//        //chama o metodo resposavel pelo cadastro
//       if($this->Produto->cadastrar($dados)){ 
//           
//            //1 = erro
//           //2 = sucess
//          $this->redirect('dashboard', '2', 'cadastrado com sucesso');
//       }else{
//           echo 'não cadastrado';
//       }
//    }
//    
//    public function listarCliente(){
//        
//       $this->view->clientes = $this->Cliente->listarAll();    
//       $this->Render("admin/lista-cliente");
//    }
//    
//    public function editarCliente($id){
//        
    //$clientesEditar = $this->Cliente->listarWhere($id);        
//        $this->view->clientesEditar = $clientesEditar;
//        $this->Render("admin/editar-clientes");
//    }
//    
//    public function updateCliente($request){
//        $id = $request->post->id;
//        
//        
//        $data = [
//            'nome' => $request->post->nome, 'cpf' => $request->post->cpf, 'senha' => $request->post->senha, 
//            'confirmaSenha' => $request->post->confirmaSenha, 'tipoCliente' => $request->post->tipoCliente,
//            'email' => $request->post->email, 'login' => $request->post->login, 'cidade' => $request->post->cidade,
//            'cep' => $request->post->cep, 'endereco' => $request->post->endereco, 'uf' => $request->post->uf,
//            'complemento' => $request->post->complemento
//        ];
//        
//        $rules = [
//            'nome' => 'required', 'cpf' => 'required', 'email' => 'required', 'login' => 'required', 
//            'senha' => 'required|min:6', 'confirmaSenha' => 'required|min:6', 'tipoCliente' => 'required',
//            'cidade' => 'required', 'cep' => 'required', 'endereco' => 'required', 'uf' => 'required',
//            'complemento' => 'required'
//        ];
//       
//        
//        if(Validator::make($data, $rules)){
//        $this->redirect("dashboard/alterar/cliente/{$id}");
//        }
//        
////        $dados = $request->post;        
////        if($this->Cliente->atualizar($dados)){
////            $this->redirect('dashboard/listar/clientes', '2', 'Atualizado com sucesso');
////        } else {
////            $this->redirect('dashboard/listar/clientes', '4', 'Erro ao tentar atualizar');
////        }
//        
//    }
//    
//    public function deleteCliente($id){       
//        
//        if($this->Cliente->deletar($id)){
//            $this->redirect('dashboard/listar/clientes', '3', 'cadastrado Deletado');
//        }else{
//            $this->redirect('dashboard/listar/clientes', '4', 'Erro ao tentar deletar cadastro');
//        }
//    }
}
