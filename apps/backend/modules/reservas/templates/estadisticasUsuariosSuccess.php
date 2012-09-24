<?php 
  use_javascript('jquery.dataTables.js', 'last');
  use_stylesheet('demo_table.css');
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
        <?php $counter = 0; ?>
        <?php foreach($listados as $listado):
          $counter++;
        ?>  
        <div>
          <div style="text-align: center;">
            <h2 style="font-size:30px !important">
              <?php echo $listado['titulo'];?>
            </h2>
          </div>
          <div class="datos">
            <table id="table_<?php echo $counter;?>" class="display <?php echo (count($listado['datos']) > 1 ? 'tables': '' );?>" width="100%">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Pais</th>
                  <th>Cultura</th>
                  <th>Cantidad</th>
                </tr>
              <tbody>
                <?php $odd = true; ?>
                <?php foreach($listado['datos'] as $dato): ?>
                  <tr class="gradeA <?php echo ($odd)? "odd": "even"?>">
                    <td><?php echo $dato["email"];?></td>
                    <td><?php echo $dato["username"];?></td>
                    <td><?php echo $dato["name"] . " ".$dato['last_name'];?></td>
                    <td><?php echo $dato["country_code"];?></td>
                    <td><?php echo $dato["culture"];?></td>
                    <td><?php echo $dato["suma"];?></td>
                  </tr>
                  <?php $odd = !$odd; ?>
                <?php 
                endforeach;
                ?>
              </tbody>
              </thead>
            </table>
          </div>
          
        </div>
        <div class="clear"></div>
        <hr/>
        <?php
        endforeach;
        ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('.tables').dataTable({ "aaSorting": [[ 5, "desc" ]] });
  });
</script>