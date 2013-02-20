<?php use_helper('I18N', 'Date', 'mdAsset') ?>
<?php include_partial('mdApartamento/assets') ?>
<?php use_plugin_stylesheet('mastodontePlugin', '../js/jquery-ui-1.8.4/css/smoothness/jquery-ui-1.8.4.custom.css') ?>
<?php use_plugin_javascript('mastodontePlugin', 'jquery-ui-1.8.4/js/jquery-ui-1.8.4.custom.min.js', 'last') ?>
<?php use_javascript('tiny_mce/tiny_mce.js', 'last'); ?>
<?php include_partial('mdMediaContentAdmin/javascriptInclude'); ?>
<?php use_stylesheet('../js/datepicker/css/datepicker.css') ?>
<?php use_javascript('datepicker/js/datepicker.js') ?>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> <?php
use_javascript("http://maps.google.com/maps/api/js?sensor=true");
use_plugin_javascript('mdGoogleMapDoctrinePlugin', 'mdGoogleMapControlBackend.js', 'last');
use_plugin_javascript('mdGoogleMapDoctrinePlugin', 'mdGoogleMap.js', 'last');

?>
<div id="sf_admin_container">
  <h1><?php echo __('Apartamentos_Editar', array(), 'messages') ?></h1>

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
  
  <hr />
  
  <div id="news_extra_info">
    <div id="user_images">
			<h1><?php echo __('Apartamentos_Imagenes') ?></h1>
      <?php include_component('mdMediaContentAdmin', 'showAlbums', array('object' => $md_apartamento)) ?>
    </div>
  </div>

  <div class="clear"></div>

  <hr />
 	<div class="clear"></div>
  <div id="user_images">
		<h1><?php echo __('Apartamentos_ubicacion') ?></h1>

      <?php include_partial('mdMap/googleMap', array('object' => $md_apartamento, 'options' => array('width' => 538, 'height' => 400,'zoom'=>15))); ?>
	</div>

  
</div>
  <script type="text/javascript">
  $(document).ready(function() {  

  initializeLightBox('<?php echo $md_apartamento->getId(); ?>', '<?php echo $md_apartamento->getObjectClass(); ?>', MdAvatarAdmin.getInstance().getDefaultAlbumId());
  });
  </script>

