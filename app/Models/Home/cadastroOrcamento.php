<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Home;

use Core\BaseModel;

/**
 * Description of cadastroOrçamento
 *
 * @author Wesllen
 */
class cadastroOrcamento extends BaseModel {

    protected $tabela = "os";
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 1;

    public function cadastrar($request) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-m-d H:i:s");
        if (!empty($request->post->produto) and is_array($request->post->produto)) {
            $produtos = implode(',', $request->post->produto);

        $array = array(
            "0" => array(
                'nome_pessoa' => $request->post->nome, 'status' => "Aberto",
                'dataInicial' => $request->post->data, 'telefone' => $request->post->telefone,
                'celular' => $request->post->celular,
                'quantidade' => $request->post->quantidade, 'estado' => $request->post->estado,
                'cidade' => $request->post->cidade, 'produtos' => $produtos,
                'descricaoServico' => $request->post->descricao, 'dataCadastro' => $dataAtual
            ));       
                
           
        if ($this->insert($array)) {
            return TRUE;
        } else {
            return False;
        }
    }
    }

}
