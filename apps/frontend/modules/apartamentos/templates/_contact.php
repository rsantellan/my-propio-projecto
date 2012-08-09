<div class="hosts">
	<div class="info-img">
		<?php if($depto->getTipo() == 'fullservice'): ?>
          <img src="/images/logo.png" width="126" />
		<?php else: ?>
          <img id='user_avatar_image' src="<?php echo $depto->getMdUser()->getMdUserProfile()->retrieveAvatar(array(mdWebOptions::WIDTH =>126 , mdWebOptions::CODE => mdWebCodes::CROPRESIZE ));?>" width="126" />
		<?php endif; ?>
		</div>
    <div class="info">
    	<li style="font-size:19px; font-family: 'BelloSmCp';"><?php echo __('Apartamento_Host') ?></li>
        <li style="font-size:13px; font-family: 'CourierRegular';">

					<?php if($depto->getTipo() == 'fullservice' or $depto->getMdUserId()==null): ?>
						Rent n' Chill
						</li>
	        <li style="font-size:10px; font-family: 'CourierRegular';">
						<a href="<?php echo url_for('@funcionamiento'); ?>"><?php echo __('Apartamento_More info') ?></a></li>
			    </div>

			    <button class="contact" type="button" href="<?php echo url_for('@contacto')?>"><?php echo __('Apartamento_Contact') ?></button>

					<?php else: ?>
						<?php echo $depto->getMdUser()->getMdUserProfile()->getName() . ' ' . $depto->getMdUser()->getMdUserProfile()->getLastName() ?>
						</li>
	        <li style="font-size:10px; font-family: 'CourierRegular';">
						<a href="<?php echo url_for('profile',$depto->getMdUser()); ?>"><?php echo __('Apartamento_More info') ?></a></li>
			    </div>

					<?php endif; ?>

</div>
