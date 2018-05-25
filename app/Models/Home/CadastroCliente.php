<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Home;

use Core\BaseModel;

class CadastroCliente extends BaseModel {

    protected $tabela = "cliente";
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 1;
    
    public function CheckIsNull($request) {
        if ( $request->nome === '' ||  $request->cpf === '' ||   $request->tipoCliente === '' || 
                 $request->email === '' ||   $request->login === '' ||   $request->cidade === '' ||  
                 $request->cep === '' ||   $request->endereco === '' ||   $request->uf === '' ||  
                 $request->complemento === ''
                ) {
            return TRUE;
        }
        return FALSE;
    }
    
    public function checkExists($request){
        $sql = "cpf = '{$request->cpf}' and login = '{$request->login}'";
       $check = $this->read("*", $sql);
        if (count($check) > 0) {

            return TRUE;
        }
        return FALSE;
    }

    public function cadastrar($request) {        
        if($this->CheckIsNull($request) != TRUE){            
           if($this->checkExists($request) !=TRUE){
                
               $array = array(
                    '0' => array(
                        'nome' => $request->nome, 'cpf' => $request->cpf, 'tipoCliente' => $request->tipoCliente,
                        'email' => $request->email, 'login' => $request->login, 'cidade' => $request->cidade, 
                        'cep' => $request->cep, 'endereco' => $request->endereco, 'uf' => $request->uf, 
                        'complemento' => $request->complemento
                    )
                );
               
                if($this->insert($array)){
                    return TRUE; 
                }else{
                    return FALSE;
                }
           }else{
               $this->redirect('cadastro', '4', 'Dados já cadastrados');
             exit(); 
           }    
        }else{
            $this->redirect('cadastro', '2', 'preencha todos os dados');
            
            exit();
        }
   }

}
