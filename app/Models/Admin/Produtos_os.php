<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;
use Core\BaseModel;
/**
 * Description of Produtos_os
 *
 * @author laboratorio
 */
class Produtos_os extends BaseModel {
    protected $tabela = "produtos_os";
     protected $tabelaUse = 1;
     
     public function cadastrar(array $result) {
         
        $array = array(
             "0" => array(
            'quantidade' => $result['quantidade'], 'os_id' => $result['os_id'], 'produtos_id' => $result['produtos_id'],
            'subTotal' => $result['subTotal'], 'DataCadastro' => $result['DataCadastro']
        ));

        if ($dados = $this->insert($array)) {
            return $dados;
        } else {
            return False;
        }
    }

    public function atualizar($request) {
        $id = $request->post->idClientes;
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-d-m H:m:s");
        $array = array(
            'nomeCliente' => $request->post->nomeCliente, 'documento' => $request->post->documento,
            'pessoa' => $request->post->pessoa, 'telefone' => $request->post->telefone, 'ddd_celular' => $request->post->ddd_celular,
            'celular' => $request->post->celular, 'email' => $request->post->email, 'rua' => $request->post->rua, 'numero' => $request->post->numero,
            'bairro' => $request->post->bairro, 'cidade' => $request->post->cidade, 'estado' => $request->post->estado,
            'cep' => $request->post->cep, "dataUpdate" => $dataAtual
        );
        if ($this->update($array, "idClientes = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deletar($id) {

        if ($this->delete("idProdutos_os = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
