<?php

namespace App\Models;
use Core\BaseModel;
use Core\Validator;
class Cliente extends BaseModel{
    protected $tabela = "cliente";
    protected $tabelaUse = 1;
    
    public function checkPassword($request) {
        if ($request->senha1 === $request->senha2) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function CheckIsNull($request) {
        if (
                $request->nome === '' || $request->cpf === '' || $request->tipoCliente === '' || $request->senha1 === '' ||
                $request->senha2 === '' || $request->email === '' || $request->login === '' || $request->cidade === '' ||
                $request->cep === '' || $request->endereco === '' || $request->uf === '' ||
                $request->complemento === ''
        ) {
            return TRUE;
        }
        return FALSE;
    }

    public function checkExists($request) {
        $sql = "cpf = '{$request->cpf}' and login = '{$request->login}'";
        $check = $this->read("*", $sql);
        if (count($check) > 0) {

            return TRUE;
        }
        return FALSE;
    }

    public function cadastrar($request) {
        
        $data = [
            'nome' => $request->post->nome, 'email' => $request->post->email, 'telefone' => $request->post->telefone,
            'login' => $request->post->user, 'password' => $request->post->password, 
            'password_repeat' => $request->post->password_repeat
        ];
        
        print_r($data); die();
        
        $rules = [
            'nome' => 'required', 'email' => 'required', 'telefone' => 'required', 'login' => 'required', 
            'password' => 'required|min:6', 'password_repeat' => 'required|min:6'
        ];
        
        if(Validator::make($data, $rules)){
            return False;
        }
        return TRUE;
        
        
        
        
        
        
//        if ($this->CheckIsNull($request) != TRUE) {
//            if ($this->checkPassword($request) === TRUE) {
//                if ($this->checkExists($request) != TRUE) {
//
//                    $array = array(
//                        '0' => array(
//                            'nome' => $request->nome, 'cpf' => $request->cpf, 'tipoCliente' => $request->tipoCliente,
//                            'email' => $request->email, 'login' => $request->login, 'cidade' => $request->cidade,
//                            'cep' => $request->cep, 'endereco' => $request->endereco, 'uf' => $request->uf,
//                            'complemento' => $request->complemento
//                        )
//                    );
//
//                    if ($this->insert($array)) {
//                        return TRUE;
//                    } else {
//                        return FALSE;
//                    }
//                } else {
//                    $this->redirect('cadastro', '4', 'Dados já cadastrados');
//                    exit();
//                }
//            } else {
//                $this->redirect('cadastro', '2', 'As senhas não sao igaus');
//            exit();
//            }
//        } else {
//            $this->redirect('cadastro', '2', 'preencha todos os dados');
//            exit();
//        }
    }
    
    public function listarAll(){
        $lista = $this->read("*");
        return $lista;
    }
    
    public function listarWhere($id){
        $lista = $this->read("*", "idCliente = {$id}");
        return $lista;
    }
    
    public function atualizar($request){
        $id = $request->id;
               
        if($this->CheckIsNull($request) != TRUE){
            if ($this->checkPassword($request) === TRUE) {
                $array = array(
                        
                            'nome' => $request->nome, 'cpf' => $request->cpf, 'tipoCliente' => $request->tipoCliente,
                            'email' => $request->email, 'login' => $request->login, 'cidade' => $request->cidade,
                            'cep' => $request->cep, 'endereco' => $request->endereco, 'uf' => $request->uf,
                            'complemento' => $request->complemento
                        
                    );            
                if($this->update($array, "idCliente = {$id}")){
                    return TRUE;
                }else{
                    return FALSE;
                }
                
            } else {
                $this->redirect('dashboard/alterar/cliente/'.$id, '2', 'As senhas não sao igaus');
            exit();
            }
        } else {
             $this->redirect('dashboard/alterar/cliente/'.$id, '2', 'preencha todos os dados');
            exit();
        }
    }
    
    public function deletar($id){
        
        if($this->delete("idCliente = {$id}")){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
