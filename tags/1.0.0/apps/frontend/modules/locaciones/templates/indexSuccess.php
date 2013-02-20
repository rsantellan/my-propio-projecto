
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
            <div class="ciudad">
								<?php if($locacion->hasAvatar()): ?>
								<a href="<?php echo url_for('locacion',$locacion); ?>">
                <img src="<?php echo $locacion->retrieveAvatar(array(mdWebOptions::WIDTH => 101, mdWebOptions::HEIGHT => 101, mdWebOptions::CODE => mdWebCodes::CROPRESIZE )) ?>" width="101" height="101" />
								</a>
								<?php endif; ?>
                <div class="city"><?php echo $locacion->getNombre() ?></div>
                <div class="country"><?php echo format_country($locacion->getCountry()); ?></div>
                <div class="more green"><a href="<?php echo url_for('locacion',$locacion); ?>"><?php echo __('InfoTuristica_More info') ?></a></div>
            </div>
<?php endforeach; ?>
				</div>
    </div>
    <div class="col-right">
    	<div class="propiedades">
            <div class="propiedad"><?php echo __('InfoTuristica_Propierties') ?></div>
        </div>   
<!--
        <div class="reservacion">Rocha</div>
        <div class="reserved">
            	<img src="/images/proipedad-img.png" width="75" height="75" />
                <div class="tipo">Perfect 2br apt Gorlero</div>
                <div class="servicios">2 Bedroom apartment</div>
                <div class="pn-precio green">€43</div>
                <div style="float:left; font-size:9px; font-family: 'CourierRegular';">per night</div>
        </div>
        <div class="reserved">
            	<img src="/images/proipedad-img.png" width="75" height="75" />
                <div class="tipo">Perfect 2br apt Gorlero</div>
                <div class="servicios">2 Bedroom apartment</div>
                <div class="pn-precio green">€43</div>
                <div style="float:left; font-size:9px; font-family: 'CourierRegular';">per night</div>
        </div>
        <div class="reserved">
            	<img src="/images/proipedad-img.png" width="75" height="75" />
                <div class="tipo">Perfect 2br apt Gorlero</div>
                <div class="servicios">2 Bedroom apartment</div>
                <div class="pn-precio green">€43</div>
                <div style="float:left; font-size:9px; font-family: 'CourierRegular';">per night</div>
        </div>
        <div class="reserved">
            	<img src="/images/proipedad-img.png" width="75" height="75" />
                <div class="tipo">Perfect 2br apt Gorlero</div>
                <div class="servicios">2 Bedroom apartment</div>
                <div class="pn-precio green">€43</div>
                <div style="float:left; font-size:9px; font-family: 'CourierRegular';">per night</div>
        </div> 
        <div class="separator" style="float: left; margin: 15px 0 15px 15px;"><img width="269" height="7" src="/images/separator2.png"></div>
        <div class="visited">Montevideo</div>
        <div class="visitados">
            	<img src="/images/proipedad-img.png" width="75" height="75" />
                <div class="tipo">Perfect 2br apt Gorlero</div>
                <div class="servicios">2 Bedroom apartment</div>
                <div class="pn-precio green">€43</div>
                <div style="float:left; font-size:9px; font-family: 'CourierRegular';">per night</div>
        </div>
        <div class="visitados">
            	<img src="/images/proipedad-img.png" width="75" height="75" />
                <div class="tipo">Perfect 2br apt Gorlero</div>
                <div class="servicios">2 Bedroom apartment</div>
                <div class="pn-precio green">€43</div>
                <div style="float:left; font-size:9px; font-family: 'CourierRegular';">per night</div>
        </div>
        <div class="visitados">
            	<img src="/images/proipedad-img.png" width="75" height="75" />
                <div class="tipo">Perfect 2br apt Gorlero</div>
                <div class="servicios">2 Bedroom apartment</div>
                <div class="pn-precio green">€43</div>
                <div style="float:left; font-size:9px; font-family: 'CourierRegular';">per night</div>
        </div> 
-->
    </div>
</div>
