<?php



namespace App\Models\Admin;
use Core\BaseModel;

/**
 * Description of Estatisticas
 *
 * @author laboratorio
 */
class Estatisticas extends BaseModel {
    protected  $tabela = "lancamentos";
    private $data_atual;
    
    
    
    public function Receita($periodo = NULL){
//        SET GLOBAL lc_time_names=pt_BR;
        
//        date_default_timezone_set('America/Sao_Paulo');
//        $this->data_atual = date("Y-m-d H:i:s");
//        ($periodo == null) ? '' : $intervalo = date('Y-m-d H:i:s', strtotime($periodo, strtotime($this->data_atual)));
//        ($intervalo == '') ? '' : $intervaloResult = "AND dataCreate >= '{$intervalo}'";
        
        if($periodo == NULL){
            $resultado = $this->estatistica("MONTHNAME(data_pagamento) as mes, extract(month from data_pagamento) as mes_num, sum(valor) as num_valor_tot", NULL, "GROUP BY extract(month from data_pagamento)");
            
        }else{
            $resultado = $this->estatistica("sum(valor), MONTHNAME(data_pagamento) as mes", "MONTHNAME(data_pagamento) = '{$periodo}'");
                         
        } 
        
            
            //select extract(month from data_pagamento) as mes, sum(valor) as num_valor_tot from `lancamentos` GROUP BY extract(month from data_pagamento)
        //SELECT sum(valor), MONTHNAME(data_pagamento) FROM `lancamentos` where MONTHNAME(data_pagamento) = 'july'
        
//        $resultados = $this->estatistica('valor, tipo, 	MONTHNAME(dataCreate) as mes', "tipo = 'Receita' AND status = 'pago' {$intervaloResult}" );
//
//        foreach ($resultados as $result){            
//            $dados['mes'] = $result->mes;
//            $dados['valor'] = $result->valor;
//
//            
//        }
//
        echo json_encode($resultado);
    }
    public function Despesa(){       
        
        $r = $this->read('tipo');
        
    }
    
}
