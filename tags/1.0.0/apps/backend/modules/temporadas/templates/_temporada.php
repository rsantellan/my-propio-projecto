<?php $form = new mdLocacionTemporadaForm(array(), array(), false); ?>

<div id="sf_admin_container-disp">
  <h1><?php echo __('Locacion_Temporadas', array(), 'messages') ?></h1>

  <?php include_partial('temporadas/flashes') ?>

  <div id="sf_admin_header-disp">
    <?php include_partial('temporadas/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_content-disp">
    <form action="<?php echo url_for('md_locacion_temporada_collection', array('action' => 'batch')) ?>" method="post">
    <div id="disp-list">
      <?php include_partial('temporadas/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    </div>
    <ul class="sf_admin_actions">
      <?php include_partial('temporadas/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('temporadas/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer-disp">
    <?php include_partial('temporadas/list_footer', array('pager' => $pager)) ?>
  </div>
  
  <div id="disponiblidad-create" style="display: none;">
    <form id="disponiblidad-create-form" name="md_locacion_temporada" method="POST" action="<?php echo url_for('@temporada-new'); ?>">
      <?php echo $form->renderHiddenFields(); ?>
      <input type="hidden" value="<?php echo $md_locacion->getId(); ?>" name="md_locacion_temporada[md_locacion_id]" />
      Desde: <?php echo $form['date_from']->render(); ?> 
      Hasta: <?php echo $form['date_to']->render(); ?>
      Tipo: <?php echo $form['tipo']->render();?>
      <?php //echo $form;?>
      <input type="submit" name="save" value="guardar" />
    </form>
    <div id="disponiblidad-create-form-errores" style="display: none; color: red;">
      
    </div>
  </div>
</div>

<script type="text/javascript">  
  function addTemporada(form){
    mdShowLoading();
    $.ajax({
        url:   $(form).attr('action'),
        type: 'post',
        dataType: 'json',
        data: $(form).serialize(),
        success: function(json){
          mdHideLoading();
          if(json.response == "OK")
          {
            $('#disponiblidad-create-form > select').val('');
            $('#disp-list').html(json.options.table);
            $('#disponiblidad-create').hide();
            //$('#disponiblidad-create').html("");
          }
          else
          {
            //console.log(json.options);
            $("#disponiblidad-create-form-errores").html(json.options);
            $("#disponiblidad-create-form-errores").show();
          }
        },
        complete: function(){},
        error: function(){}
    });
    return false;    
  }
  
  function deleteTemporada(obj){
    mdShowLoading();
    $.ajax({
        url:   $(obj).attr('href'),
        type: 'post',
        dataType: 'json',
        success: function(json){
          mdHideLoading();
          if(json.response == "OK"){
            $(obj).parents('tr').remove();
          }
        },
        complete: function(){},
        error: function(){}
    });
    return false;    
  }
  
  $(document).ready(function() {
    $('#create-disp').bind('click', function(event){
      event.preventDefault();
      $('#disponiblidad-create').slideDown(500);
    });
    
    $('#disponiblidad-create-form').submit(function(event){
      event.preventDefault();
      addTemporada(this);
      return false;
    });
  });
  
</script>
