<?php use_helper('mdAsset') ?>
<?php include_partial('global/includeJQueryUI'); ?>
<?php use_stylesheet('comision2.css') ?>
<?php
//uploader
use_javascript('custom/manageSimpleAlbum.js');
use_javascript('custom/uploader.js');
use_stylesheet('../fancybox/jquery.fancybox-1.3.4.css');
use_javascript('../fancybox/jquery.fancybox-1.3.4.pack.js');

use_javascript("http://maps.google.com/maps/api/js?sensor=true");
use_plugin_javascript('mdGoogleMapDoctrinePlugin', 'mdGoogleMapControlFrontend.js', 'last');
use_plugin_javascript('mdGoogleMapDoctrinePlugin', 'mdGoogleMap.js', 'last');
?>
<script>
var __MD_CONTROLLER_FRONTEND_SYMFONY = '/';
</script>

<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Apartamento_Editar navegacion') ?></li>
</div> 
<?php echo include_component('locaciones','title_right', array('mdLocacion'=>$depto->getMdLocacion())); ?>
<div class="main-content-up">
    <div class="col-left">
        <div class="titulo blue"><?php echo __('Apartamento_Editar') ?></div>
        <form class="form-send" method="post">
<?php echo $form->renderHiddenFields(); ?>
             <div class="campos-right">
                 <div class="campos-right-left">
                     <li<?php echo ($form['es']['titulo']->hasError()?' class="error_list"':'');?>><?php echo __('Apartamento_TITLE') ?>:</li>
                     <li<?php echo ($form['es']['titulo']->hasError()?' class="error_list"':'');?>><?php echo $form['es']['titulo']->render(array('tabindex'=>1)) ?></li>
                     <li<?php echo ($form['es']['copete']->hasError()?' class="error_list"':'');?>><?php echo __('Apartamento_SHORT DESCRIPTION') ?></li>
                     <li<?php echo ($form['es']['copete']->hasError()?' class="error_list"':'');?>><?php echo $form['es']['copete']->render(array('tabindex'=>3)) ?>
                     <li<?php echo ($form['es']['descripcion']->hasError()?' class="error_list"':'');?>><?php echo __('Apartamento_Description') ?></li>
                     <li<?php echo ($form['es']['descripcion']->hasError()?' class="error_list"':'');?>><?php echo $form['es']['descripcion']->render(array('tabindex'=>4)) ?></li>
                 </div>
                 <div class="campos-right-right">
                     <li<?php echo ($form['md_locacion_id']->hasError()?' class="error_list"':'');?>><?php echo __('Apartamento_CITY') ?></li>
                     <li<?php echo ($form['md_locacion_id']->hasError()?' class="error_list"':'');?>><?php echo $form['md_locacion_id']->render(array('tabindex'=>2)) ?></li>
                 </div>
             </div>
             <div class="gallery">
                 <li style="display:list-item;"><?php echo __('Apartamento_Gallery') ?></li>
                 <li><?php include_component('apartamentos', 'upload', array('mdApartamento'=>$form->getObject())) ?></li>
								 <li>
										<div class="main-photos" id="avatar_content">
		                	<div class="photo"><img src="<?php
		                	if($depto->hasAvatar())
		                		echo $depto->retrieveAvatar(array(mdWebOptions::WIDTH => 100, mdWebOptions::HEIGHT => 100, mdWebOptions::CODE => mdWebCodes::CROPRESIZE ));
											else
												echo '/images/house.png';
											?>" width="180" height="179" /></div>
		             		</div>
								 </li>
								<ul id="thumbs_content">
<?php
$media = mdMediaManager::getInstance(mdMediaManager::IMAGES, $depto)->load(mdMedia::$default);
if($media):
foreach($media->getItems() as $pic):
?>
		                 <li><img src="<?php echo $pic->getUrl(array(mdWebOptions::WIDTH => 40, mdWebOptions::HEIGHT => 40, mdWebOptions::CODE => mdWebCodes::CROPRESIZE )) ?>" width="48" height="40" /></li>
<?php
endforeach;
endif;
?>
		             </ul>
						</div>
             <div class="map">
                 <li style="display:list-item;"><?php echo __('Apartamento_Map') ?></li>
                 <li><?php include_partial('mdMap/googleMap', array('object' => $depto, 'options' => array('width' => 667, 'height' => 230))); ?></li>
             </div>
             <div class="amenities">
                 <li style="display:list-item;"><?php echo __('Apartamento_Amenities') ?></li>
                 <ul style="padding-left:0px;">
	<?php echo $form['md_comodidad_list']->render() ?>
                 </ul>
             </div>
             <div class="price">
                     <li>price <span>(<?php echo mdCurrencyHandler::getCurrent()->getCode() ?>)</span></li>
                     <ul<?php echo ($form['precio_baja']->hasError()?' class="error_list"':'');?>>
                         <li><?php echo __('Apartamento_Per person');?> (<?php echo __('Apartamento_Low season') ?>)</li>
                         <li><?php echo $form['precio_baja']->render() ?></li>
                     </ul>
                     <ul<?php echo ($form['precio_alta']->hasError()?' class="error_list"':'');?>>
                         <li><?php echo __('Apartamento_Per person');?> (<?php echo __('Apartamento_High season') ?>)</li>
                         <li><?php echo $form['precio_alta']->render() ?></li>
                     </ul>
             </div>
             <div class="guests">
                <li<?php echo ($form['cantidad_personas']->hasError()?' class="error_list"':'');?>><?php echo __('Apartamento_guests') ?></li>
                    <ul>
                      <li><?php echo $form['cantidad_personas']->render() ?></li>
                  </ul>
             </div>
             <div class="insurance">
                 <li style="display:list-item;"><?php echo __('Apartamento_INSURANCE') ?></li>
                 <li style="font-family: 'CourierRegular'; font-size:11px;"><?php echo __('Apartamento_INSURANCE descripcion') ?></li>
                 <li style="display: inline; float: left;"><button class="insurance-button" type="submit"><?php echo __('Apartamento_Submit') ?></button></li>
             </div>    
        </form> 
    </div>    
</div>