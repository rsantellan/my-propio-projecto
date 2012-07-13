<?php use_helper('I18N', 'Date', 'mdAsset') ?>
<?php slot('mdLocacion', true) ?>
<?php include_partial('mdLocacion/assets') ?>
<?php use_plugin_stylesheet('mastodontePlugin', '../js/jquery-ui-1.8.4/css/smoothness/jquery-ui-1.8.4.custom.css') ?>
<?php use_plugin_javascript('mastodontePlugin', 'jquery-ui-1.8.4/js/jquery-ui-1.8.4.custom.min.js', 'last') ?>
<?php use_javascript('tiny_mce/tiny_mce.js', 'last'); ?>
<?php include_partial('mdMediaContentAdmin/javascriptInclude'); ?>


<div id="sf_admin_container">
  <h1><?php echo __('Locacion_editar', array(), 'messages') ?></h1>

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

	<div id="news_extra_info">
  <?php include_component('temporadas', 'temporada', array('md_locacion' => $md_locacion)); ?>
	</div>
	<div class="clear"></div>
	<div id="news_extra_info">
	  <div id="user_images">
					<h1><?php echo __('Locacion_Imagenes') ?></h1>
	      <?php include_component('mdMediaContentAdmin', 'showAlbums', array('object' => $md_locacion)) ?>
	  </div>
	</div>

	<div class="clear"></div>


</div>
<script type="text/javascript">
$(document).ready(function() {  

  initializeLightBox('<?php echo $md_locacion->getId(); ?>', '<?php echo $md_locacion->getObjectClass(); ?>', MdAvatarAdmin.getInstance().getDefaultAlbumId());
});

</script>