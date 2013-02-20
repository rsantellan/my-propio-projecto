<?php
slot('novedades', true);

//use_stylesheet('novedades.css');
use_stylesheet('forgot.css');

?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('novedades_Navegacion') ?></li>
</div> 

<div class="main-content-up">
  <div id="forgot_password_container">
  <?php
  include_partial('mdAuth/forgotPassword', array('form' => $form, 'exception' => $exception, 'isAjax' => $isAjax));
  ?>
  </div>
</div>


