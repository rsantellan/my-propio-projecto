<?php $form = new mdDisponibilidadForm(array(), array(), false); ?>

<div id="sf_admin_container-disp">
  <h1><?php echo __('Apartamentos_Ocupacion', array(), 'messages') ?></h1>

  <?php include_partial('disponibilidades/flashes') ?>

  <div id="sf_admin_header-disp">
    <?php include_partial('disponibilidades/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_content-disp">
    <form action="<?php echo url_for('md_disponibilidad_collection', array('action' => 'batch')) ?>" method="post">
    <div id="disp-list">
      <?php include_partial('disponibilidades/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    </div>
    <ul class="sf_admin_actions">
      <?php include_partial('disponibilidades/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('disponibilidades/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer-disp">
    <?php include_partial('disponibilidades/list_footer', array('pager' => $pager)) ?>
  </div>
  
  <div id="disponiblidad-create" style="display: none;">
    <form id="disponiblidad-create-form" name="md_disponibilidad" method="POST" action="<?php echo url_for('@disponibilidad-new'); ?>">
      <?php echo $form->renderHiddenFields(); ?>
      <input type="hidden" value="<?php echo $md_apartamento->getId(); ?>" name="md_disponibilidad[md_apartamento_id]" />
      Desde: <?php echo $form['fecha_desde']->render(); ?>
      Hasta: <?php echo $form['fecha_hasta']->render(); ?>
      <input type="submit" name="save" value="guardar" />
    </form>
  </div>
</div>

<script type="text/javascript">  
  function addDisponibilidad(form){
    mdShowLoading();
    $.ajax({
        url:   $(form).attr('action'),
        type: 'post',
        dataType: 'json',
        data: $(form).serialize(),
        success: function(json){
          mdHideLoading();
          if(json.response == "OK"){
            $('#disponiblidad-create-form > select').val('');
            $('#disp-list').html(json.options.table);
            $('#disponiblidad-create').hide();
          }
        },
        complete: function(){},
        error: function(){}
    });
    return false;    
  }
  
  function deleteDisponibilidad(obj){
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
      addDisponibilidad(this);
      return false;
    });
  });
  
</script>
