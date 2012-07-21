	<div class="datos">
	 <p><span><?php echo __('Usuario_nombre') ?>: </span><?php echo $sf_user->getProfile()->getName() . ' ' . $sf_user->getProfile()->getLastName(); ?></p>
   <p><span><?php echo __('Usuario_email') ?>: </span><?php echo $sf_user->getEmail(); ?></p>
   <p><span><?php echo __('Usuario_pais') ?>: </span><?php echo sfCultureInfo::getInstance()->getCountry($sf_user->getProfile()->getCountryCode()); ?></p>
   <p style="margin-top:15px;"><span><?php echo __('Usuario_Son estos datos correctos') ?>?</span> <a href="<?php echo url_for('@logout') ?>" class="blue"><?php echo __('Usuario_Cambiar usuario') ?></a></p>
</div>
