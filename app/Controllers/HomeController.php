<?php

namespace App\Controllers;

use Core\BaseController;
use App\Models\Home\Login;
use App\Models\Home\cadastroOrcamento;
use App\Models\Cliente;
use App\Models\Home\Produtos;

class HomeController extends BaseController {
    private $cliente;
    private $orcamento;
    private $produto;
    public function __construct() {
        $this->cliente = new Cliente();
        $this->orcamento = new cadastroOrcamento();
        $this->produto =  new Produtos();
    }

    public function index() {
        //seta o titulo da pagina
        echo $this->setPageTitle("Home");
        $dados = $this->produto->read("*");
        @$this->view->produtos = $dados;
        
        //renderiza a pagina e o layout
        $this->Render('home/index', 'layoutHome');
    }

    public function login() {
        //seta o titulo da pagina
        echo $this->setPageTitle("Login");
        //renderiza a pagina e o layout
        $this->Render("home/login", 'layoutHome');
    }

    public function validarLogin($request) {        
           $login = new Login();
        if ($login->isNull($request->post) === FALSE) {

            //verifica se existe o usuario digitado, se sim retorna TRUE
            if ($login->verificarlogin($request->post)) {
                //se existe usuario chama o metodo que redireciona para a pagina especificada
                $this->redirect("dashboard");
            } else {
                //Seto a pagina que vai ser redirecionada e se eu quizer passo uma menssagem via session
                $this->redirect("index", "Usuario Invalido");
            }
        } else {
            //Seto a pagina que vai ser redirecionada e se eu quizer passo uma menssagem via session
            $this->redirect("login", "Por favor preencha todos os campos", "/login");
        }
    }

    public function cadastro() {
        //seta o titulo da pagina 
        $this->setPageTitle('Cadastrar');
        //renderiza a pagina
        $this->Render('home/cadastrar-cliente');
    }

    public function cadastroCliente($request) {
        //traz todos as request post enviadas
        //$dados = $request->post;
        
        if($this->cliente->cadastrar($request)){
            
        }else{
            $this->redirect('cadastro', '4', 'OPS algo deu errado no seu cadastro');
        }
        //instacia o objeto da model Cadastro
        
//        if ($dados->password <= 5) {
//            $this->redirect('cadastro', '4', 'OPS a senha deve ter mais que 5 caracteres');
//        } elseif ($dados->password_repeat <= 5) {
//            $this->redirect('cadastro', '4', 'OPS a senha deve ter mais que 5 caracteres');        
//        } else {
//            //verifica se foi cadastrado com sucesso retorna TRUE
//            if ($this->cliente->cadastrar($request)) {
//                //Apresenta a mensagem de cadastro efetuado com sucesso
//                $this->redirect('cadastro', '1', 'Cadastrado com secesso');
//            } else {
//                //Apresenta a mensagem de erro ao tentar cadastrar
//                $this->redirect('cadastro', '4', 'OPS algo deu errado no seu cadastro');
//            }
//        }
    }
    
    public function cadastroOrcamento($request){
        $dados = $request->post;        
        
    if($this->orcamento->cadastrar($dados)){
        session_start();
        $_SESSION['orcamento'] = "Orçamento efetuado com sucesso";
        $this->redirect("index", "Orçamento efetuado com sucesso");
    }
    }

    

}
