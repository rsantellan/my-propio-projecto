
<?php use_stylesheet('tourist-info.css') ?>

<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('InfoTuristica_navegacion') ?></li>
</div> 
<?php echo include_component('locaciones','title_right', array('mdLocacion'=>$locaciones->getFirst())); ?>

<div class="main-content-up">
    <div class="col-left">
    	<div class="tourist">
        	<div class="info-tourist"><?php echo __('InfoTuristica_titulo') ?></div>
                <?php foreach($locaciones as $locacion): ?>
                    <?php include_partial("locaciones/smallInfoLocacion", array('locacion' => $locacion, 'sf_cache_key' => 'locacion_'.$locacion->getId().'_cultura_'.$sf_user->getCulture()));?>
                <?php endforeach; ?>
            </div>
    </div>
    <div class="col-right">
    	<div class="propiedades">
            <div class="propiedad"><?php echo __('InfoTuristica_Propierties') ?></div>
        </div>   
    </div>
</div>
