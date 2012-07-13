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
        <li class="green logged;"><a href="#"><?php echo $sf_user->getProfile()->getName() . ' ' . $sf_user->getProfile()->getLastName() ?></a>
        	<ul>
        		<li><a href="<?php echo url_for('profile', $sf_user->getMdUser()); ?>"><?php echo __('Usuario_Ver perfil') ?></a> - </li>
                <li><a href="<?php echo url_for('@logout'); ?>"><?php echo __('Usuario_Salir') ?></a></li>
            </ul>
        </li>
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
        <li class="redes-sociales"><a href="<?php echo __('Global_Link Twitter') ?>"><img src="/images/twitter.png"></a></li>
        <li class="redes-sociales"><a href="<?php echo __('Global_Link Facebook') ?>"><img src="/images/facebook.png"></a></li>
        <li><img width="1" height="21" src="/images/separator.png"></li>
<?php  $currency = mdCurrencyHandler::getCurrent(); ?>
        <li class="eur"><a class="green" href="#"><?php echo $currency->getSymbol() . ' ' . $currency->getCode() ?></a>
        	<ul style="color:#000;">
        		<li style="font-weight:bold;"><?php echo __('Global_Choose currency') ?>:</li>
<?php
$isFirst = true;
foreach(mdCurrencyHandler::getCurrencies() as $cur): ?>
                <li>
									<?php if(!$isFirst){
										echo ' - ';
									}else{
										$isFirst = false;
									} ?>
									<a href="<?php echo url_for('@changeCurrency?code=' . $cur->getCode()); ?>" <?php if($cur == $currency) echo 'class="green"';?>><?php echo $cur->getSymbol() . ' ' . $cur->getCode() ?></a>
								</li>
<?php endforeach; ?>
            </ul>
        </li>
        <li><img width="1" height="21" src="/images/separator.png"></li>
        <li class="banderas"><a href="<?php echo url_for('@change_language?language=es') ?>"><img width="21" height="14" src="/images/flag-esp.png"></a></li>
        <li class="banderas"><a href="<?php echo url_for('@change_language?language=en') ?>"><img width="21" height="14" src="/images/flag-usa.png"></a></li>
        <li class="banderas"><a href="<?php echo url_for('@change_language?language=pt') ?>"><img width="21" height="14" src="/images/flag-por.png"></a></li>
        </ul>
      </div>
    </menu>
</header>