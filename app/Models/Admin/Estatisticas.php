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
    
    
    
    public function Receita($periodo = "-5 month"){
//        SET GLOBAL lc_time_names=pt_BR;
        
        date_default_timezone_set('America/Sao_Paulo');
        $this->data_atual = date("Y-m-d H:i:s");
        ($periodo == null) ? '' : $intervalo = date('Y-m-d H:i:s', strtotime($periodo, strtotime($this->data_atual)));
        ($intervalo == '') ? '' : $intervaloResult = "AND dataCreate >= '{$intervalo}'";
        
        
        
        
        $resultados = $this->estatistica('valor, tipo, 	MONTHNAME(dataCreate) as mes', "tipo = 'Receita' AND status = 'pago' {$intervaloResult}" );

        foreach ($resultados as $result){            
            $dados['mes'] = $result->mes;
            $dados['valor'] = $result->valor;

            
        }

        echo json_encode($dados);
    }
    public function Despesa(){       
        
        $r = $this->read('tipo');
        print_r($r);
    }
    
}
