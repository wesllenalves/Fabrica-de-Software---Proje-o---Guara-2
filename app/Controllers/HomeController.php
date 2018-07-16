<?php

namespace App\Controllers;

use Core\BaseController;
use App\Models\Home\Login;
use App\Models\Home\cadastroOrcamento;
use App\Models\Cliente;
use App\Models\Home\Produtos;
use App\Models\Home\Usuarios;
use Core\Session;

class HomeController extends BaseController {

    private $cliente;
    private $orcamento;
    private $produto;

    public function __construct() {
        $this->cliente = new Cliente();
        $this->orcamento = new cadastroOrcamento();
        $this->produto = new Produtos();
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
        $usuario = new Usuarios();

        if ($dados = $usuario->validar($request)) {
            session_start();
            $this->redirect("index", self::DANGER ,'Preencha Todos os Dados');
            
        } else {
            //verifica se existe o usuario digitado, se sim retorna TRUE
            if ($usuario->verificarlogin($request->post)) {
                //se existe usuario chama o metodo que redireciona para a pagina especificada
                $base = base_url('');                
                echo  "<script>window.location = '{$base}/dashboard';</script>";
                
            } else {

                echo '<script>
			$(document).ready(function(){
				swal("Ops...","Usuario Invalido","warning");
			});
			</script>';
            }
//        } else {
//                echo json_encode([
//                "success" => false,
//                "message" => "Por favor, preencha todos os campos!"
//            ]);
//            //Seto a pagina que vai ser redirecionada e se eu quizer passo uma menssagem via session
////            $this->redirect("login", "Por favor preencha todos os campos", "/login");
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

        if ($this->cliente->cadastrar($request)) {
            
        } else {
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

    public function cadastroOrcamento($request) {        
            if ($this->orcamento->cadastrar($request)) {
               echo '<script>
			$(document).ready(function(){
				swal("Parabéns","Cadastro efetuado com sucesso","success");
			});
			</script>';
            }else{
                echo '<script>
			$(document).ready(function(){
				swal("Ops...","Algo deu errado ao tentar cadastar seu orçamento","warning");
			});
			</script>';
            }
        
    }

}
