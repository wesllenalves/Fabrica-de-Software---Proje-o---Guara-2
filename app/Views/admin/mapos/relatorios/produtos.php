<?php
require_once __DIR__.'/../head.php';
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="https://www.ultramapos.online/" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="https://www.ultramapos.online/index.php/relatorios" class="tip-bottom" title="Relatorios">Relatorios</a> <a href="https://www.ultramapos.online/index.php/relatorios/produtos/" class="current tip-bottom" title="Produtos">Produtos</a> </div>
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
                    <li><a target="_blank" href="https://www.ultramapos.online/index.php/relatorios/produtosRapid"><i class="icon-barcode"></i> <small>Todos os Produtos</small></a></li>
                    <li><a target="_blank" href="https://www.ultramapos.online/index.php/relatorios/produtosRapidMin"><i class="icon-barcode"></i> <small>Com Estoque Mínimo</small></a></li>
                    
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
                    <div class="span12 alert alert-info">Deixe em branco caso não deseje utilizar o parâmetro.</div>
                    <form target="_blank" action="https://www.ultramapos.online/index.php/relatorios/produtosCustom" method="get">
                        <div class="span12 well">
                            <div class="span6">
                                <label for="">Preço de Venda de:</label>
                                <input type="text" name="precoInicial" class="span12 money" />
                            </div>
                            <div class="span6">
                                <label for="">até:</label>
                                <input type="text"  name="precoFinal" class="span12 money" />
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">
                            <div class="span6">
                                <label for="">Estoque de:</label>
                                <input type="text" name="estoqueInicial" class="span12" />
                            </div>
                            <div class="span6">
                                <label for="">até:</label>
                                <input type="text" name="estoqueFinal" class="span12" />
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


<script src="https://www.ultramapos.online/js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".money").maskMoney();

      
    });
</script>

      </div>
    </div>
  </div>
</div>
<?php
require_once __DIR__.'/../footer.php';
?>

