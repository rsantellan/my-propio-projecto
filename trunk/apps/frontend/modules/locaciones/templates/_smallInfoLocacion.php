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
