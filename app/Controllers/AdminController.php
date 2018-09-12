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
use App\Models\Admin\Cliente;
use App\Models\Admin\cadastroServico;
use App\Models\Admin\Os;
use App\Models\Admin\Lancamentos;
use App\Models\Admin\Produtos_os;
use App\Models\Admin\Servicos_os;
use App\Models\Admin\Usuario;
use App\Models\Admin\Estatisticas;
use Core\Validator;
use Core\Session;
use App\Models\Admin\Certificado;

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
    private $Produtos_os;
    private $Servicos_os;
    private $Usuario;
    private $Estatistica;
    protected $sessao;

    public function __construct() {
        $this->Clientes = new Cliente();
        $this->Produto = new CadastroProduto();
        $this->Funcionario = new CadastroFuncionario();
        $this->Servico = new cadastroServico();
        $this->os = new Os();
        $this->lancamentos = new Lancamentos();
        $this->Produtos_os = new Produtos_os();
        $this->Servicos_os = new Servicos_os();
        $this->sessao = Session::getInstance();
        $this->Usuario = new Usuario();
        $this->Estatistica = new Estatisticas();
    }
    
    public function certificado(){
         $certificado = new Certificado();
         
         var_dump($certificado->listar());
//
//      $this->view->certificados = $certificado->listar();

//    $this->setPageTitle("Admin - Certificados");
      $this->Render('admin/mapos/certificado/index', 'layoutAdminMapos');
    }

    public function index() {
        $this->Trafego();
        $this->Render('admin/mapos/index', 'layoutAdminMapos');
    }

    public function JsonReceita() {
        header("Access-Control-Allow-Origin : *");
        $this->Estatistica->Receita();
    }

    public function JsonDespesa() {

        $this->Estatistica->Despesa();
    }

    public function JsonMeses() {

        $this->Estatistica->Meses();
    }

    public function clientes() {
//        $this->setPageTitle("Admin");
        $dados = $this->Clientes->read("*", "", "ORDER BY idClientes");
        @$this->view->clientes = $dados;

        $this->Render('admin/mapos/clientes/clientes', 'layoutAdminMapos');
    }

    public function clientesVisualizar($request) {
        $this->setPageTitle("Admin");
        $id = $request->get->id;
        $dados = $this->Clientes->read("*", "idClientes = $id");
        @$this->view->oneClientes = $dados;

        $this->Render('admin/mapos/clientes/vizualizarCliente', 'layoutAdminMapos');
    }

    public function clientesAdicionar() {
//        $this->setPageTitle("Admin");

        $this->Render('admin/mapos/clientes/addCliente', 'layoutAdminMapos');
    }

    public function clientesAdicionarSalvar($request) {
        $data = [
            'nomeCliente' => $request->post->nomeCliente, 'documento' => $request->post->documento,
            'pessoa' => $request->post->pessoa, 'telefone' => $request->post->telefone, 'ddd_celular' => $request->post->ddd_celular,
            'celular' => $request->post->celular, 'email' => $request->post->email, 'rua' => $request->post->rua, 'numero' => $request->post->numero,
            'bairro' => $request->post->bairro, 'cidade' => $request->post->cidade, 'estado' => $request->post->estado, 'cep' => $request->post->cep,
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
                $this->redirect("clientes", self::SUCCESS, "Cadstrado com sucesso");
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
        $this->Render('admin/mapos/clientes/editCliente', 'layoutAdminMapos');
    }

    public function clientesEditarSalvar($request) {
        $id = $request->post->idClientes;
        //print_r($request->post->documentoCpnj); die();
        $documento = NULL;
        $tipoPessoa = NULL;
        if (!empty($request->post->documentoCpf)) {
            $documento = $request->post->documentoCpf;
            $tipoPessoa = "PF";
        } elseif (!empty($request->post->documentoCpnj)) {
            $documento = $request->post->documentoCpnj;
            $tipoPessoa = "PJ";
        }
        $data = [
            'idClientes' => $request->post->idClientes, 'nomeCliente' => $request->post->nomeCliente, 'documento' => $documento, 'tipoPessoa' => $tipoPessoa,
            'telefone' => $request->post->telefone, 'celular' => $request->post->celular, 'email' => $request->post->email,
            'rua' => $request->post->rua, 'numero' => $request->post->numero, 'bairro' => $request->post->bairro,
            'cidade' => $request->post->cidade, 'estado' => $request->post->estado, 'cep' => $request->post->cep
        ];

        $rules = [
            'nomeCliente' => 'required', 'documento' => 'required', 'telefone' => 'required',
            'celular' => 'required', 'email' => 'required', 'rua' => 'required', 'numero' => 'required',
            'bairro' => 'required', 'cidade' => 'required', 'estado' => 'required', 'cep' => 'required'
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("clientes/editar?id={$id}");
        } else {
            if ($this->Clientes->atualizar($data)) {
                $this->redirect("clientes", "1", "Editado com sucesso");
            } else {
                $this->redirect("clientes", "4", " POS Erro ao editar cliente");
            }
        }
    }

    public function clientesRemover($request) {
        $id = $request->post->id;
        if ($this->Clientes->deletar($id)) {
            $this->redirect("clientes", "1", "Deletado com sucesso");
        } else {
            $this->redirect("clientes", "4", " POS Erro ao deletar cliente");
        }
    }

    public function produtos() {
//        $this->setPageTitle("Admin");
        $produtos = new CadastroProduto();
        $dados = $produtos->read();
        @$this->view->produtos = $dados;
        $this->Render('admin/mapos/produtos/produtos', 'layoutAdminMapos');
    }

    public function produtosVisualizar($request) {
        $id = $request->get->id;

//        $this->setPageTitle("Admin");
        $produtos = new CadastroProduto();
        $dados = $produtos->read("*", "idProduto = $id");

        @$this->view->produtos1 = $dados;
        $this->Render('admin/mapos/produtos/visualizarProdutos', 'layoutAdminMapos');
    }

    public function produtosEditar($request) {
        $id = $request->get->id;
        $dados = $this->Produto->read("*", "idProduto = $id");
        @$this->view->oneProdutos = $dados;
        $this->Render('admin/mapos/produtos/editProdutos', 'layoutAdminMapos');
    }

    public function produtosEditarSalvar($request) {

        $data = [
            'nome_produto' => $request->post->nome_produto, 'unidade' => $request->post->unidade, 'precoCompra' => $request->post->precoCompra,
            'precoVenda' => $request->post->precoVenda, 'estoque' => $request->post->estoque,
            'estoqueMinimo' => $request->post->estoqueMinimo
        ];

        $rules = [
            'nome_produto' => 'required', 'unidade' => 'required', 'precoCompra' => 'required', 'precoVenda' => 'required',
            'estoque' => 'required', 'estoqueMinimo' => 'required'
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("produtos");
        } else {
            if ($this->Produto->atualizar($request)) {
                $this->redirect("produtos", "1", "Editado com sucesso");
            } else {
                $this->redirect("produtos", "4", " POS Erro ao editar cliente");
            }
        }
    }

    public function produtosAdicionar() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/produtos/addProdutos', 'layoutAdminMapos');
    }

    public function produtosSalvar($request) {
        //$this->setPageTitle("Admin");
        $data = [
            'nome_produto' => $request->post->descricao, 'unidade' => $request->post->unidade, 'precoCompra' => $request->post->precoCompra,
            'precoVenda' => $request->post->precoVenda, 'estoque' => $request->post->estoque,
            'estoqueMinimo' => $request->post->estoqueMinimo, 'validade' => $request->post->validade
        ];

        $rules = [
            'nome_produto' => 'required', 'unidade' => 'required', 'precoCompra' => 'required', 'precoVenda' => 'required',
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
        $id = $request->post->id;
        if ($this->Produto->deletar($id)) {
            $this->redirect("produtos", "1", "Deletado com sucesso");
        } else {
            $this->redirect("produtos", "4", " POS Erro ao deletar cliente");
        }
    }

    public function servicos() {
        $servico = new cadastroServico();
        $dados = $servico->read("*");
        @$this->view->servicos = $dados;

        $this->Render('admin/mapos/servicos/servicos', 'layoutAdminMapos');
    }

    public function servicosAdicionar() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/servicos/addServico', 'layoutAdminMapos');
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
        $this->Render('admin/mapos/servicos/editServicos', 'layoutAdminMapos');
    }

    public function servicosUpdate($request) {
        $data = [
            'nome_servico' => $request->post->nome, 'descricao' => $request->post->descricao, 'preco' => $request->post->preco
        ];

        $rules = [
            'nome_servico' => 'required', 'descricao' => 'required', 'preco' => 'required'
        ];

        if (Validator::make($data, $rules)) {
            $this->redirect("servicos");
        } else {
            if ($this->Servico->atualizar($request)) {
                $this->redirect("servicos", "1", "Servicos Editado com Sucesso");
            } else {
                $this->redirect("servicos", "4", "Ocorreu um erro ao tentar Editar Servicos");
            }
        }
    }

    public function servicosRemover($request) {
        $id = $request->post->id;
        if ($this->Servico->deletar($id)) {
            $this->redirect("servicos", "1", "Deletado com sucesso");
        } else {
            $this->redirect("servicos", "4", " POS Erro ao deletar cliente");
        }
    }

    public function os() {
//        $this->setPageTitle("Admin");
        $array = array(
            "chave" => "s JOIN clientes c ON s.`clientes_id` = c.idClientes LEFT JOIN usuarios u ON s.`usuarios_id` = u.idUsuarios"
        );
        $dados = $this->os->readChave($array, "*");
        @$this->view->os = $dados;
        //print_r($this->view->os); die();
        $this->Render('admin/mapos/os/os', 'layoutAdminMapos');
    }

    public function osAdicionar() {
        $clientes = $this->Clientes->read("*");
        @$this->view->allClientes = $clientes;

        $usuario = $this->Usuario->read("*");
        @$this->view->allUsuario = $usuario;
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/os/addOs', 'layoutAdminMapos');
    }

    public function osAdicionarSalvar($request) {

        $data = [
            'clientes_id' => $request->post->idClientes, 'usuarios_id' => $request->post->idUsuario,
            'status' => $request->post->status, 'dataInicial' => $request->post->dataInicial,
            'telefone' => $request->post->telefone, 'quantidade' => $request->post->quantidade,
            'cidade' => $request->post->cidade, 'produtos' => $request->post->produtos,
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
                $this->redirect("os/editar?id={$id}", "1", "OS Cadastrado com Sucesso");
            } else {
                $this->redirect("os", "4", "Ocorreu um erro ao tentar cadastar OS");
            }
        }
    }

    public function osVisualizar($request) {
        $id = $request->get->id;
        $array = array(
            "chave" => "s JOIN clientes c ON s.`clientes_id` = c.idClientes LEFT JOIN usuarios u ON s.`usuarios_id` = u.idUsuarios where s.idOs = {$id}"
        );
        $dados = $this->os->readChave($array, "*");
        @$this->view->os = $dados;

        $arrayproduto = array(
            "chave" => " s INNER JOIN produto ps ON s.produtos_id = ps.idProduto LEFT JOIN os o ON s.os_id = o.idOs where s.os_id = $id"
        );
        $dados2 = $this->Produtos_os->readChave($arrayproduto, "*");

        @$this->view->oneProdutos = $dados2;

        $arrayServico = array(
            "chave" => " s INNER JOIN servicos ps ON s.`servicos_id` = ps.idServicos LEFT JOIN os o ON s.os_id = o.idOs where s.os_id = $id"
        );
        $dados3 = $this->Servicos_os->readChave($arrayServico, "*");

        @$this->view->oneServico = $dados3;

//        print_r($dados2); die();
////        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/os/visualizarOs', 'layoutAdminMapos');
    }

    public function osEditar($request) {
        $id = $request->get->id;
        $arrayos = array(
            "chave" => "s JOIN clientes c ON s.`clientes_id` = c.idClientes LEFT JOIN usuarios u ON s.`usuarios_id` = u.idUsuarios WHERE s.idOs = $id"
        );
        $dados = $this->os->readChave($arrayos, "*");
        @$this->view->oneOs = $dados;

        $produtos = $this->Produto->read("*");

        @$this->view->allProdutos = $produtos;


        $servicos = $this->Servico->read("*");
        @$this->view->allServicos = $servicos;

        $clientes = $this->Clientes->read("*");
        @$this->view->allClientes = $clientes;

        $usuario = $this->Usuario->read("*");
        @$this->view->allUsuario = $usuario;

        $arrayOsProduto = array(
            "chave" => "p JOIN produtos_os po ON p.idProduto = po.produtos_id where os_id = $id"
        );

        $OsProduto = $this->Produto->readChave($arrayOsProduto, "*");

        @$this->view->OsProduto = $OsProduto;


        $arraysevico = array(
            "chave" => "s JOIN servicos_os ps ON s.idOs = ps.os_id LEFT JOIN servicos p ON p.idServicos = ps.servicos_id where ps.os_id = $id"
        );
        $dados3 = $this->os->readChave($arraysevico, "*");

        @$this->view->oneServicos = $dados3;



        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/os/editOs', 'layoutAdminMapos');
    }

    public function updateSalvarOs($request) {
        $id = $request->post->idOs;
        if ($this->os->atualizarOs($request)) {
            $this->redirect("os/editar?id={$id}", self::SUCCESS, "Editado com sucesso");
        } else {
            $this->redirect("os/editar?id={$id}", self::DANGER, "Houver algum erro ao tentar Editar");
        }
    }

    public function osRemover($request) {
        $id = $request->post->id;
        if ($this->os->deletar($id)) {
            $this->redirect("os", self::SUCCESS, "Deletado com sucesso");
        } else {
            $this->redirect("os", self::DANGER, " POS Erro ao deletar cliente");
        }
    }

    public function osRemoverProduto($request) {

        $id = $request->get->id;
        $os_id = $request->get->idOs;
        if ($this->Produtos_os->deletar($id)) {
            $this->redirect("os/editar?id={$os_id}", self::SUCCESS, "Deletado com sucesso");
        } else {
            $this->redirect("os/editar?id={$os_id}", self::DANGER, " POS Erro ao deletar Produto da os");
        }
    }

    public function osRemoverServico($request) {

        $id = $request->get->id;
        $idOs = $request->get->idOs;
        if ($this->Servicos_os->deletar($id)) {
            $this->redirect("os/editar?id={$idOs}", self::SUCCESS, "Deletado com sucesso");
        } else {
            $this->redirect("os/editar?id={$idOs}", self::DANGER, " POS Erro ao deletar Produto da os");
        }
    }

    public function salvarOsProduto($request) {

        $dataAtual = date("Y-d-m H:m:s");
        date_default_timezone_set('America/Sao_Paulo');
        $id = $request->post->idProduto;
        $osid = $request->post->os_id;
        $dados = $request->post;


        $dados1 = $this->Produto->read("*", "idProduto = $id");
        $preco = $dados1[0]['precoVenda'];


        $quantidade = $request->post->quantidade;
        $total = $preco * $quantidade;

        $result = array(
            'quantidade' => $quantidade, 'os_id' => $request->post->os_id, 'produtos_id' => $dados1[0]['idProduto'],
            'subTotal' => $total, 'DataCadastro' => $dataAtual
        );

        if ($this->Produtos_os->cadastrar($result)) {
            $this->redirect("os/editar?id=$osid", self::SUCCESS, "Cadastrado com sucesso");
        } else {
            $this->redirect("os/editar?id=$osid", self::DANGER, "Erro ao tentar cadastrar");
        }
    }

    public function salvarOsServico($request) {

        $dataAtual = date("Y-d-m H:m:s");
        date_default_timezone_set('America/Sao_Paulo');
        $id = $request->post->idServicos;
        $osid = $request->post->os_id;

        $dados1 = $this->Servico->read("*", "idServicos = $id");

        $preco = $dados1[0]['preco'];



        $total = $preco;

        $result = array(
            'os_id' => $request->post->os_id, 'servicos_id' => $dados1[0]['idServicos'], 'subTotal' => $total,
            'DataCadastro' => $dataAtual
        );


        if ($this->Servicos_os->cadastrar($result)) {
            $this->redirect("os/editar?id=$osid", "1", "Cadastrado com sucesso");
        } else {
            $this->redirect("os/editar?id=$osid", "1", "Errro ao tentar cadastrar");
        }
    }

    public function financeiroLancamentos() {
//        $this->setPageTitle("Admin");
        $dados = $this->lancamentos->read("*", "", "ORDER BY idLancamentos DESC");
        @$this->view->Lancamentos = $dados;
        $this->Render('admin/mapos/financeiro/lancamentos', 'layoutAdminMapos');
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
            if ($this->lancamentos->cadastrar($request)) {
                session_start();
                $this->redirect("financeiro/lancamentos", self::SUCCESS, "Lançamento adicionado com sucesso");
            } else {
                $this->redirect("financeiro/lancamentos", self::WARNING, "Ocorreu um erro ao tentar cadastar lançamento");
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
            if ($this->lancamentos->cadastrar($request)) {
                session_start();
                $this->redirect("financeiro/lancamentos", self::SUCCESS, "Lançamento adicionado com sucesso");
            } else {
                $this->redirect("financeiro/lancamentos", self::WARNING, "Ocorreu um erro ao tentar cadastar lançamento");
            }
        }
    }

    public function financeiroLancamentosEditar($request) {
        $id = $request->get->id;

        $dados = $this->lancamentos->read("*", "idLancamentos = $id");
        @$this->view->oneLancamentEdit = $dados;
        $this->Render('admin/mapos/financeiro/lancamentosEditar', 'layoutAdminMapos');
    }

    public function financeiroLancamentosEditarSalvar($request) {
        $request = $request->post;

        if ($this->lancamentos->atualizar($request)) {
            $this->redirect("financeiro/lancamentos", self::SUCCESS, "Lançamento atualizado com sucesso");
        } else {
            $this->redirect("financeiro/lancamentos", self::WARNING, "Ocorreu um erro ao tentar atualizar lançamento");
        }
    }

    public function lacamentosRemover($request) {
        $id = $request->post->id;

        if ($this->lancamentos->deletar($id)) {
            $this->redirect("financeiro/lancamentos", self::SUCCESS, "Deletado com sucesso");
        } else {
            $this->redirect("financeiro/lancamentos", self::WARNING, " POS Erro ao deletar cliente");
        }
    }

    public function Relatorios() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/index', 'layoutAdminMapos');
    }

    public function configuracoes() {
//        $this->setPageTitle("Admin");
        $this->Render('admin/mapos/index', 'layoutAdminMapos');
    }

}
