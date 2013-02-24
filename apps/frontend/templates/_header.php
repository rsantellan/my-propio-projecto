<header>
    <div class="logo">
				<a href="<?php echo url_for('@homepage') ?>">
        <img src="/images/logo.png" width="177" height="100" alt="logo" />
				</a>
        <div class="slogan"><?php echo __('Global_slogan') ?></div>
    </div>   
      <div class="nav">
      <ul id="menu">
        <?php if($sf_user->isAuthenticated()): ?>
            <?php include_partial("default/userMenu", array( 'sf_cache_key' => 'usuario_'.$sf_user->getMdUserId().'_cultura_'.$sf_user->getCulture()));?>
		<?php else: ?>
            <li class="green"><a href="<?php echo url_for('registerUser/index') ?>"><?php echo __('Global_LOG IN / SIGN UP') ?> </a></li>
        <?php endif; ?>
	<li><img width="1" height="21" src="/images/separator.png"></li>
        <li><a href="<?php echo url_for('@funcionamiento') ?>"><?php echo __('Global_HOW IT WORKS') ?></a></li> 
        <li><img width="1" height="21" src="/images/separator.png"></li>
        <li><a href="<?php echo url_for('@locaciones') ?>"><?php echo __('Global_TOURIST INFO') ?></a></li>
        <li><img width="1" height="21" src="/images/separator.png"></li>
        <li><a href="<?php echo url_for('@contacto') ?>"><?php echo __('Global_CONTACT') ?></a></li>
        <li><img width="1" height="21" src="/images/separator.png"></li>
        <li class="redes-sociales"><a href="<?php echo __('Global_Link Twitter') ?>" target="_blank" ><img src="/images/twitter.png"></a></li>
        <li class="redes-sociales"><a href="<?php echo __('Global_Link Facebook') ?>" target="_blank"><img src="/images/facebook.png"></a></li>
        <li><img width="1" height="21" src="/images/separator.png"></li>
        
        <?php  $currency = mdCurrencyHandler::getCurrent(); ?>
        <?php include_partial("default/currencyMenu", array('currency' => $currency, 'sf_cache_key' => 'currency_'.$currency->getId().'_cultura_'.$sf_user->getCulture()));?>
        
        <li><img width="1" height="21" src="/images/separator.png"></li>
        <li class="banderas"><a href="<?php echo url_for('@change_language?language=es') ?>"><img width="21" height="14" src="/images/flag-esp.png"></a></li>
        <li class="banderas"><a href="<?php echo url_for('@change_language?language=en') ?>"><img width="21" height="14" src="/images/flag-usa.png"></a></li>
        <li class="banderas"><a href="<?php echo url_for('@change_language?language=pt') ?>"><img width="21" height="14" src="/images/flag-por.png"></a></li>
        </ul>
      </div>
    </menu>
</header>
