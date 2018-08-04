<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;
use Core\BaseModel;
/**
 * Description of Usuario
 *
 * @author Wesllen
 */
class Usuario extends BaseModel{
    protected $tabela = "usuarios";
    
    public function cadastrar($request) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-d-m H:m:s");

        $array = array(
            "0" => array(
                'user' => $request->post->nomeCliente, 'password' => $request->post->documento,
                
            )
        );

        if ($this->insert($array)) {
            return TRUE;
        } else {
            return False;
        }
    }

    public function atualizar($data) {
        $id = $data['idClientes'];
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-m-d H:m:s");
        $array = array(
            'nomeCliente' => $data['nomeCliente'], 'documento' => $data['documento'], 'tipoPessoa' => $data['tipoPessoa'],
            'telefone' => $data['telefone'], 'celular' => $data['celular'], 'email' => $data['email'],
            'rua' => $data['rua'], 'numero' => $data['numero'],'bairro' => $data['bairro'], 
            'cidade' => $data['cidade'], 'estado' => $data['estado'],  'cep' => $data['cep'],
            'dataModificado' => $dataAtual
        );
        
        if ($this->update($array, "idClientes = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deletar($id) {

        if ($this->delete("idClientes = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
