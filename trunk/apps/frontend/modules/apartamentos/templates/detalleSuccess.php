<?php
use_helper('mdAsset');
use_helper('Text');
use_stylesheet('propiedad.css');
use_stylesheet("datepicker.css"); 
use_stylesheet('jquery.ad-gallery.css');
use_javascript('jquery.ad-gallery.js');

include_partial('global/includeJQueryUI');

$media = mdMediaManager::getInstance(mdMediaManager::MIXED, $depto)->load();

?>
<?php
use_javascript("http://maps.google.com/maps/api/js?sensor=true");
use_plugin_javascript('mdGoogleMapDoctrinePlugin', 'mdGoogleMapControlFrontend.js', 'last');
use_plugin_javascript('mdGoogleMapDoctrinePlugin', 'mdGoogleMap.js', 'last');
?>
<script type="text/javascript">
  $(function() {

    var galleries = $('.ad-gallery').adGallery();

  });
</script>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li><?php echo __('Apartamento_Detalle navegacion') ?></li>
    <li>/</li>
    <li class="current"><?php echo $depto ?></li>
</div> 
<?php echo include_component('locaciones','title_right', array('mdLocacion'=>$depto->getMdLocacion())); ?>
<div class="main-content-up">
    <div class="col-left">
         <div class="information">
         	<li style="font-size:16px; font-weight:bold;" class="green"><?php echo $depto ?></li>
            <li style="font-size:13px;"><?php echo $depto->getCopete() ?></li>
         </div>
         <button class="back" type="button"><?php echo __('Apartamento_Back to results') ?></button>
				<div class="clear"></div>
         <div class="like">
         	<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo url_for('apartamento', $depto, array('absolute'=>true)); ?>" scrolling="no" 
            frameborder="0" style="border:none; width:650px; height:35px"></iframe>
         </div>
				<div class="clear"></div>
<?php if($media->hasAlbum('default')): ?>
         <div id="gallery" class="ad-gallery">
              <div class="ad-image-wrapper">
              </div>
              <div class="ad-nav">
                <div class="ad-thumbs">
                  <ul class="ad-thumb-list">
<?php foreach($media->getItems() as $image): ?>
                    <li>
                      <a href="<?php echo $image->getUrl(array(mdWebOptions::WIDTH => 638, mdWebOptions::HEIGHT =>395 , mdWebOptions::CODE => mdWebCodes::CROPRESIZE )) ?>">
                        <img src="<?php echo $image->getUrl(array(mdWebOptions::WIDTH => 76, mdWebOptions::HEIGHT =>76 , mdWebOptions::CODE => mdWebCodes::CROPRESIZE )) ?>" class="image0">
                      </a>
                    </li>
<?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
<?php endif; ?>
    </div>
    <div class="col-right">
    	<div class="pre-precio">
        	<div class="price-pn"><?php echo mdCurrencyHandler::getCurrentSymbol() ?><?php echo $depto->getPrecioHoy() ?></div>
            <div class="price-pn-details">
            <li><?php echo __('Apartamento_per night') ?><br />
							(
                            
							<?php //if($depto->getMdLocacion()->esTemporadaAlta()): $temporada = $depto->getMdLocacion()->getTemporada();?>
								<?php //echo __('Apartamento_HIGH SEASON') ?> - <?php  //echo $temporada->getDesde() . ' : ' . $temporada->getHasta()?>
							<?php //else: ?>
								<?php //echo __('Apartamento_LOW SEASON') ?>
							<?php //endif; ?>
							)</li>
            </div>
        </div>
        <div class="separator"><img width="285" height="7" src="/images/separator2.png"></div>
<?php if($sf_user->isAuthenticated() and $sf_user->getMdUserId() == $depto->getmdUserId()): ?>
				<div>
					<a href="<?php echo url_for('apartamento_edit', $depto) ?>"><?php echo __('Apartamento_Editar') ?></a>
				</div>
<?php else: ?>
				<div id="bookIt">
        <?php echo include_component('reservas', 'bookit', array('mdApartamentoId'=>$depto->getId())); ?>
				</div>
        <div class="separator"><img width="285" height="7" src="/images/separator2.png"> </div>
				<?php echo include_partial('contact', array('depto'=>$depto)); ?>
<?php endif; ?>
    </div>
    <div class="row">
    	<div class="separator"><img src="/images/separator2.png" width="1020" height="7"/></div>
        <div class="col-left" id="tabs">
        	<ul class="buttons">
            <li><a href="#tab_1"><button class="current-description" type="button"><?php echo __('Apartamento_Description') ?></button></a></li>
            <li><a href="#tab_2"><button class="map" type="button"><?php echo __('Apartamento_Maps') ?></button></a></li>
          </ul>
					<div class="clear"></div>
            <div id="tab_1" class="description-text">
							<?php echo simple_format_text($depto->getDescripcion()) ?>
<?php if($depto->getDetalle()): ?>
	            <p class="green" style="font-size:14px;"><?php echo __('Apartamento_Details') ?></p>
							<?php if($depto->getDetalle()->getCuartos()!=''): ?>
	            <li><?php echo __('Apartamento_Bedrooms') ?>: <?php echo $depto->getDetalle()->getCuartos() ?></li>
							<?php endif; ?>
							<?php if($depto->getDetalle()->getBanios()!=''): ?>
	            <li><?php echo __('Apartamento_Bathrooms') ?>: <?php echo $depto->getDetalle()->getBanios() ?></li>
							<?php endif; ?>
	            <li><?php echo __('Apartamento_Extra people') ?>: <?php echo ($depto->getDetalle()->getCostoExtra()==0?'No Charge':$depto->getDetalle()->getCostoExtra()) ?></li> 
	            <li><?php echo __('Apartamento_Minimum Stay') ?>: <?php echo $depto->getDetalle()->getMinimoDias() ?> nights</li>
							<?php if($depto->getDetalle()->getBarrio()!=''): ?>
	            <li><?php echo __('Apartamento_Neighborhood') ?>: <?php echo $depto->getDetalle()->getBarrio() ?></li> 
							<?php endif; ?>
							<?php if($depto->getDetalle()->getMetraje()!=''): ?>
	            <li><?php echo __('Apartamento_Size') ?>: <?php echo $depto->getDetalle()->getMetraje() ?>m2</li>
							<?php endif; ?>
<?php endif; ?>
						</div>
						<div id="tab_2" class="google_map description-text">
							<br/>
							<?php include_partial('mdMap/googleMapView', array('object' => $depto, 'options' => array('width' => 700, 'height' => 400))); ?>
						</div>
        </div>
        <div class="col-right">
        	<p class="green" style="font-size:14px;font-family: 'CourierRegular';"><?php echo __('Apartamento_Amenities') ?></p>
            <div class="amenities">
							<?php foreach($comodidades as $comodidad): ?>
								<div <?php if($depto->hasComodidad($comodidad)) echo 'class="active"' ?>>
									<div class="image">
										<img src="/images/amenities/<?php echo $comodidad->getImagen() ?>.png" />
									</div>
									<div class="caption"><?php echo $comodidad->getNombre(); ?></div>
								</div>
							<?php endforeach; ?>
						</div>
        </div>
    </div>
</div>
<script>
	$(function() {
		$( "div#tabs" ).tabs({
			select: function(event, ui) {
				$('button.current-description').removeClass('current-description').addClass('description');
				$('button.current-map').removeClass('current-map').addClass('map');
				if($(ui.tab).children('button').hasClass('map'))
					$(ui.tab).children('button').removeClass('map').addClass('current-map');
				if($(ui.tab).children('button').hasClass('description'))
					$(ui.tab).children('button').removeClass('description').addClass('current-description');
			}
		});
	});
	</script>