<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Models\Admin;

use Core\BaseModel;
/**
 * Description of CadastroCliente
 *
 * @author Wesllen
 */
class CadastroCliente extends BaseModel{
     protected $tabela = "cliente";
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 1;
    
    protected function CheckIsNull($request) {
        
        if ( $request->nomeCliente === '' ||  $request->cpf === '' ||  
             $request->telefone === '' ||  $request->ddd === '' || $request->celular === '' || 
             $request->email === '' || $request->rua === '' ||   $request->numero === '' ||   $request->bairro === '' ||  
             $request->cidade === '' || $request->estado === '' || $request->cep === ''
                ) {
            return TRUE;
        }
        return FALSE;
    }
    
     public function cadastrar($request){    
        
        
        if($this->CheckIsNull($request) != TRUE){            
           
        
                $array = array(
                    "0" => array(
                        'nome' => $request->nomeCliente, 'cpf' => $request->cpf, 
                        'tipoCliente' => $request->pessoa, 'email' => $request->email, 'login' => '0', 
                        'senha' => '0', 'ddd' => $request->ddd, 'celular' => $request->celular, 
                        'bairro' => $request->bairro, 'cidade' => $request->cidade, 'rua' => $request->rua,                        
                        'cep' => $request->cep, 'uf' => $request->estado
                    )
                );

                if($this->insert($array)){
                    return TRUE;
                }else{
                    return False;
                }
           
        }else{
            $this->redirect("clientes", "4", "Preencha todos os campos");
            exit();
        }
    }
    
    public function ler(){
        $dados = $this->read("*");
        return $dados;
    }
}
