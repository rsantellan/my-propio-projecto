<?php

use_helper('Text');
use_stylesheet('info-ciudad.css');
use_stylesheet('jquery.ad-gallery.css');
use_javascript('jquery.ad-gallery.js');

$media = mdMediaManager::getInstance(mdMediaManager::MIXED, $locacion)->load();
?>
<script type="text/javascript">
  $(function() {

    var galleries = $('.ad-gallery').adGallery();

  });
</script>

<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Ciudad_navegacion') ?> <?php echo $locacion->getNombre() ?></li>
</div> 
<?php echo include_component('locaciones','title_right'); ?>
<div class="main-content-up">
    <div class="col-left">
    	<div class="titulo-info green"><?php echo $locacion->getNombre() ?></div>
        <div class="sub-titulo-info"><?php echo format_country($locacion->getCountry()); ?></div>
        <div class="sub-info green"><?php echo __('Ciudad_Info') ?></div>
         <div class="info-ciudad">
					<?php echo simple_format_text($locacion->getDescripcion()) ?>
				 <div class="clear"></div>
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
					</div>
    </div>
    <div class="col-right">
			<?php include_component('locaciones','propiedades', array('locacion'=>$locacion)); ?>
    </div>
</div>
