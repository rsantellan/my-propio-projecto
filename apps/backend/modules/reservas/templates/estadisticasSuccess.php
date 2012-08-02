<?php 
  use_javascript('jqplot/jquery.jqplot.js', 'last');
  use_javascript('jqplot/excanvas.min.js', 'last');
  use_javascript('jqplot/plugins/jqplot.pieRenderer.js', 'last');
  use_javascript('jqplot/plugins/jqplot.barRenderer.js', 'last');
  use_stylesheet('jqplot/jquery.jqplot.css');
  slot('backend_reservas', 'ok');
?>

<div id="md_center_container">
  <div class="md_shadow">
    <div class="md_center">

      <div class="md_content_center">
        <h1 style="float: left">
          <?php echo __('reservas_estadisticas'); ?>
        </h1>
        <div style="float:right">
        </div>
        <div class="clear"></div>
        <div id="md_content_actions">
        </div>              
        <div class="clear"></div>

        <div>
          Por estados.
          <div id="estados_container">
            
          </div>
        </div>
        <div>
          Por monedas
          <div id="monedas_container">
            
          </div>
        </div>
        <div>
          Por lugares
          <div id="lugares_container">
            
          </div>
        </div>
        <div>
          Meses que se crean las reservas
          <div id="creadas_container">
            
          </div>
        </div>
        <div>
          Meses que se ingresan a las reservas
          <div id="from_container">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
<?php $first = true; ?>
var currencyData = [
  <?php foreach($currency as $aux): ?>
      <?php if(!$first):
      ?>,
      <?php
      else:
      $first = false;
      endif;?>
    ["<?php echo $aux['moneda'];?>", <?php echo (int) $aux['cantidad'];?>]
  <?php endforeach; ?>
];
<?php $first = true; ?>
var statusData = [
  <?php foreach($status as $aux): ?>
      <?php if(!$first):
      ?>,
      <?php
      else:
      $first = false;
      endif;?>
    ["<?php echo $aux['status'];?>", <?php echo (int) $aux['cantidad'];?>]
  <?php endforeach; ?>
];

<?php $first = true; ?>
var lugaresData = [
  <?php foreach($locations as $aux): ?>
      <?php if(!$first):
      ?>,
      <?php
      else:
      $first = false;
      endif;?>
    ["<?php echo $aux['lugar'];?>", <?php echo (int) $aux['cantidad'];?>]
  <?php endforeach; ?>
];

<?php $first = true; ?>
var mesesCreados = [
  <?php foreach($created_at as $index => $aux): ?>
    <?php if(!$first):
        ?>,
        <?php
        else:
        $first = false;
        endif;?>
      ["<?php echo date("F", mktime(0, 0, 0, $index, 10));?>", <?php echo (int) $aux;?>]
  <?php endforeach; ?>
];

<?php $first = true; ?>
var mesesFrom = [
  <?php foreach($from_date as $index => $aux): ?>
    <?php if(!$first):
        ?>,
        <?php
        else:
        $first = false;
        endif;?>
      ["<?php echo date("F", mktime(0, 0, 0, $index, 10));?>", <?php echo (int) $aux;?>]
  <?php endforeach; ?>
];

$(document).ready(function(){
  var plot1 = jQuery.jqplot ('monedas_container', [currencyData], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true,
          showLabel: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
  
  var plot2 = jQuery.jqplot ('estados_container', [statusData], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true,
          showLabel: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
  
  var plot3 = jQuery.jqplot ('lugares_container', [lugaresData], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true,
          showLabel: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
    
  var plot4 = jQuery.jqplot ('creadas_container', [mesesCreados], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true,
          showLabel: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
    
  var plot5 = jQuery.jqplot ('from_container', [mesesFrom], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true,
          showLabel: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
});

</script>