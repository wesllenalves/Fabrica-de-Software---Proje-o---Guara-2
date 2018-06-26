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
class Cliente extends BaseModel {

    protected $tabela = "clientes";
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 1;

    public function cadastrar($request) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-d-m H:m:s");

        $array = array(
            "0" => array(
                'nomeCliente' => $request->post->nomeCliente, 'documento' => $request->post->documento,
                'tipoPessoa' => $request->post->pessoa, 'telefone' => $request->post->telefone, 
                'celular' => $request->post->ddd_celular. "+" .$request->post->celular, 'email' => $request->post->email,
                'rua' => $request->post->rua, 'numero' => $request->post->numero,
                'bairro' => $request->post->bairro, 'cidade' => $request->post->cidade, 'estado' => $request->post->estado,
                'cep' => $request->post->cep, 'dataCadastro' => $dataAtual,
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
