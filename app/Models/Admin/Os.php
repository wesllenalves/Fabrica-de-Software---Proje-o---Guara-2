<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;
use Core\BaseModel;
/**
 * Description of Os
 *
 * @author Wesllen
 */
class Os extends BaseModel{
    protected $tabela = "os";
     protected $tabelaUse = 1;
    
    public function cadastrar($request) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-d-m H:m:s");

        $array = array(
            "0" => array(
                'nome' => $request->post->nome, 'usuarios_id' => $request->post->usuarios_id,
                'status' => $request->post->status, 'dataInicial' => $request->post->dataInicial,
                'dataFinal' => $request->post->dataFinal, 'telefone' => $request->post->telefone, 
                'quantidade' => $request->post->quantidade,'cidade' => $request->post->cidade,
                'produtos' => $request->post->produtos,'descricaoServico' => $request->post->descricaoServico,
                'dataCadastro' => $dataAtual
            )
        );

        if ($this->insert($array)) {
            return TRUE;
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

        if ($this->delete("idOS = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
