<?php include_partial('global/includeJQueryUI') ?>
<form id="md_narrow_search_form_2">
  	<div class="price-range">
      	<div class="titulo-price-range"><?php echo __('Search_Price range') ?></div>
          <div class="separator"><img src="/images/separator2.png" width="285" height="7" /> </div>
          <div class="demo" style="float: left;">
	<p>
                  <label for="md_narrow_search_price_range"><?php echo __('Search_Precio en') ?> <?php echo mdCurrencyHandler::getCurrentSymbol() ?></label>
									<?php echo $form['md_price_range']->render(array('style'=>'border:0; color:#72D400; font-weight:bold; float:none;')) ?>
              </p>
              <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                  <div class="ui-slider-range ui-widget-header" style="left: 15%;"></div>
                  <a class="ui-slider-handle ui-state-default ui-corner-all" style="left: 15%;" href="#"></a>
                  <a class="ui-slider-handle ui-state-default ui-corner-all" style="left: 60%;" href="#"></a>
              </div>                
</div>
      </div>
      <div class="filter-by" style="float:left; width:284px;">
      	<div class="titulo-filter-range"><?php echo __('Search_Filter by') ?></div>
          <div class="separator"><img src="/images/separator2.png" width="285" height="7" /> </div>
          <div class="filter">
              <ul>
              	<li style="font-size:20px; font-family: 'BelloSmCp';"><?php echo __('Search_Filter Tipo de Propiedad') ?></li>
                  <li><?php echo $form['tipo_propiedad']->render() ?></li>
              </ul>
          </div>
      </div>
      <div class="order-by" style="float:left; width:284px;">
      	<div class="titulo-order-range"><?php echo __('Search_Order by') ?></div>
          <div class="separator"><img src="/images/separator2.png" width="285" height="7" /> </div>
          <div class="order">
          	<ul>
              	<li style="font-size:20px; font-family: 'BelloSmCp';"></li>
									<li><?php echo $form['order_by']->render() ?></li>
              </ul>
          </div>
      </div>
</form>
			<script>
				$(function() {
					$( "#slider-range" ).slider({
						range: true,
						min: <?php echo $rango[0] ?>,
						max: <?php echo $rango[1] ?>,
						values: [ <?php echo implode(',',$rango_default->getRawValue()) ?> ],
						slide: function( event, ui ) {
							setPriceRange(ui.values[ 0 ],ui.values[ 1 ]);
						}
					});
					setPriceRange($( "#slider-range" ).slider( "values", 0 ), $( "#slider-range" ).slider( "values", 1 ));
					
					function setPriceRange(val1, val2){
						var input = $( "#m_md_price_range" );
						input.val( "" + val1 + " - " + val2 );
					}
				});
				</script>