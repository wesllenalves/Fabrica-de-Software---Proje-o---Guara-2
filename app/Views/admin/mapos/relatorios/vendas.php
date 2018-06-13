<?php
require_once __DIR__.'/../head.php';
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="https://www.ultramapos.online/" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="https://www.ultramapos.online/index.php/relatorios" class="tip-bottom" title="Relatorios">Relatorios</a> <a href="https://www.ultramapos.online/index.php/relatorios/vendas/" class="current tip-bottom" title="Vendas">Vendas</a> </div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
          
                                                
                      
<div class="row-fluid" style="margin-top: 0">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-list-alt"></i>
                </span>
                <h5>Relatórios Rápidos</h5>
            </div>
            <div class="widget-content">
                <ul class="site-stats">
                    <li><a target="_blank" href="https://www.ultramapos.online/index.php/relatorios/vendasRapid"><i class="icon-tags"></i> <small>Todas as Vendas</small></a></li>
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="span8">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-list-alt"></i>
                </span>
                <h5>Relatórios Customizáveis</h5>
            </div>
            <div class="widget-content">
                <div class="span12 well">

                    <form target="_blank" action="https://www.ultramapos.online/index.php/relatorios/vendasCustom" method="get">
                        <div class="span12 well">
                            <div class="span6">
                                <label for="">Data de:</label>
                                <input type="date" name="dataInicial" class="span12" />
                            </div>
                            <div class="span6">
                                <label for="">até:</label>
                                <input type="date"  name="dataFinal" class="span12" />
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">
                            <div class="span6">
                                <label for="">Cliente:</label>
                                <input type="text"  id="cliente" class="span12" />
                                <input type="hidden" name="cliente" id="clienteHide" />

                            </div>
                            <div class="span6">
                                <label for="">Vendedor:</label>
                                <input type="text" id="tecnico"   class="span12" />
                                <input type="hidden" name="responsavel" id="responsavelHide" />
                            </div>
                        </div>
          

                        <div class="span12" style="margin-left: 0; text-align: center">
                            <input type="reset" class="btn" value="Limpar" />
                            <button class="btn btn-inverse"><i class="icon-print icon-white"></i> Imprimir</button>
                        </div>
                    </form>
                </div>
                .
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://www.ultramapos.online/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="https://www.ultramapos.online/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="https://www.ultramapos.online/js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".money").maskMoney();
        
        $("#cliente").autocomplete({
            source: "https://www.ultramapos.online/index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clienteHide").val(ui.item.id);


            }
      });

  //    $("#tecnico").autocomplete({
  //          source: "index.php/os/autoCompleteUsuario",
   //         minLength: 2,
  //          select: function( event, ui ) {
//
 //                $("#responsavelHide").val(ui.item.id);
//

 //           }
 //     });

    });
	
	$(function() {
	 var tecnicoauto = [{"label":"Betito santos","id":"1"},{"label":"lucas jonas gomes torres","id":"2"},{"label":"Wharlys Carl","id":"3"},{"label":"Monic cutano","id":"4"},{"label":"TAYO BAR TEMAKERIA LTDA","id":"5"},{"label":"Paulo Henrique ","id":"6"},{"label":"Total Cell","id":"7"},{"label":"Lulao","id":"8"},{"label":"Leonardo Sampaio","id":"9"},{"label":"Wagner Carvalho","id":"10"},{"label":"Rodrigo Paulino De Oliveira","id":"11"},{"label":"KEVIN MAZZEI","id":"12"},{"label":"Wesley Rodrigues","id":"13"},{"label":"Alessandro Teixeira Nunes","id":"14"},{"label":"Wanderson Vasconcelos dos Santos","id":"15"},{"label":"Teste","id":"16"},{"label":"Meirisnelson Loko","id":"17"},{"label":"Elite InfoCell","id":"18"},{"label":"MANOEL MESSIAS DOS SANTOS","id":"19"},{"label":"Marlon Guavira","id":"20"},{"label":"Vladimir Beloti","id":"21"},{"label":"Stelio Camoes Filho","id":"22"},{"label":"EDNEY PALOSCHI","id":"23"},{"label":"Km Store","id":"24"},{"label":"Lucas camargos ","id":"25"},{"label":"Fernando","id":"26"},{"label":"matheus g","id":"27"},{"label":"Jo\u00e3o Arthur","id":"28"},{"label":"EMERSON","id":"29"},{"label":"Fernando Camargo","id":"30"},{"label":"Jean Bolis","id":"31"},{"label":"Rafael Silva","id":"32"},{"label":"Maicon Aurelio","id":"33"},{"label":"Fabio Lucas","id":"34"},{"label":"Charles","id":"35"},{"label":"Infortop Geisel","id":"36"},{"label":"danylloh araujo","id":"37"},{"label":"Marcos","id":"38"},{"label":"emerson","id":"39"},{"label":"Marco Rocha","id":"40"},{"label":"wolney","id":"41"},{"label":"Max Leandro Albuquerque de Almeida","id":"44"},{"label":"Erveson Pereira","id":"45"},{"label":"S\u00f3 impressoras","id":"46"},{"label":"kleber da rosa","id":"47"},{"label":"Danilo dos santos","id":"48"},{"label":"KM Multi","id":"49"},{"label":"wesllen alves teste de cadastro","id":"50"}];
   $("#tecnico").autocomplete({
            source: tecnicoauto,
            minLength: 2,
            select: function( event, ui ) {

                 $("#responsavelHide").val(ui.item.id);


            }
      });
});	
</script>

      </div>
    </div>
  </div>
</div>
<?php
require_once __DIR__.'/../footer.php';
?>