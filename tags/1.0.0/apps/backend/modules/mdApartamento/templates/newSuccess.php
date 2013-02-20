<?php use_helper('I18N', 'Date') ?>
<?php include_partial('mdApartamento/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Apartamentos_Nuevo', array(), 'messages') ?></h1>

  <?php include_partial('mdApartamento/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('mdApartamento/form_header', array('md_apartamento' => $md_apartamento, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('mdApartamento/form', array('md_apartamento' => $md_apartamento, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('mdApartamento/form_footer', array('md_apartamento' => $md_apartamento, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
