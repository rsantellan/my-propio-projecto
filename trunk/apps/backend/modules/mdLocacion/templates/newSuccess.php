<?php use_helper('I18N', 'Date') ?>
<?php slot('mdLocacion', true) ?>
<?php include_partial('mdLocacion/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Locacion_nuevo', array(), 'messages') ?></h1>

  <?php include_partial('mdLocacion/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('mdLocacion/form_header', array('md_locacion' => $md_locacion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('mdLocacion/form', array('md_locacion' => $md_locacion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('mdLocacion/form_footer', array('md_locacion' => $md_locacion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
