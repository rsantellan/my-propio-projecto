<?php 
include_partial('global/includeJQueryUI');

use_stylesheet('submit-sl.css');
use_stylesheet('../fancybox/jquery.fancybox-1.3.4.css');
use_javascript('../fancybox/jquery.fancybox-1.3.4.pack.js');

use_javascript('regiterUser.js');
use_javascript('jquery.scrollTo-min.js');
use_helper('Text');
?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Submit_navegacion') ?></li>
</div> 
<?php echo include_component('locaciones','title_right'); ?>

<div style="display:none">
    <div id="data">
    	<img src="/images/key.png" width="48" height="40" style="float:left"/>
        <div class="texto-titulo-right-fancy"><?php echo __('Funcionamiento_Full service') ?></div>
        <div class="texto-subtitulo-right" style="float:left">
						<?php echo simple_format_text(__('Funcionamiento_Full service modal')) ?>
        </div>
    </div>
</div>
<div style="display:none">
    <div id="data2">
    	<img src="/images/house.png" width="48" height="40" style="float:left"/>
        <div class="texto-titulo-right-fancy"><?php echo __('Funcionamiento_Comission') ?></div>
        <div class="texto-subtitulo-right" style="float:left">
					<?php echo simple_format_text(__('Funcionamiento_Comission modal')) ?>
        </div>
    </div>
</div>

<div class="main-content-up">
    <div class="col-left">
        <div class="titulo blue"><?php echo __('Submit_HOSTING') ?></div>
        <div class="sub-title"><?php echo __('Submit_Place select your hosting plan') ?></div>
        <div class="buttons">
            <div class="div-send">
<!--              <a href="help">help</a>-->
              <button type="button" rel="fullservice" class="mfancy full <?php if($type == 'fullservice') echo 'full-press'; ?>"><?php echo __('Submit_Full Service') ?></button>
            </div>
            <div class="div-send">
<!--              <a href="help">help</a>-->
              <button type="button" rel="comission" class="mfancy comission <?php if($type == 'comission') echo 'comission-press'; ?>"><?php echo __('Submit_Comission') ?></button>
            </div>
        </div>
				<?php if($sf_user->isAuthenticated()): ?>
					<?php include_partial('registerUser/userInfo') ?>
				<?php else: ?>
		      <div id="register_new_user_div" >
		        <?php include_component('registerUser','registerUser'); ?>
		      </div>
				<?php endif; ?>
        <div class="line2"></div>
        <div class="sub-title"><?php echo __('Submit_Property info') ?></div>
        <form class="form-send" id="apart_form" onsubmit="return submitPropertyForm();">
						<?php echo $form->renderHiddenFields() ?>
             <div class="campos-right">
                 <div class="campos-right-left">
                     <li<?php if($form[$sf_user->getCulture()]['titulo']->hasError()) echo ' class="error_list"' ?>><?php echo __('Submit_TITLE') ?>:</li>
                     <li<?php if($form[$sf_user->getCulture()]['titulo']->hasError()) echo ' class="error_list"' ?>><?php echo $form[$sf_user->getCulture()]['titulo']->render(); ?></li>
                     <li<?php if($form['precio_alta']->hasError()) echo ' class="error_list"' ?>><?php echo __('Submit_PRECIO TEMPORADA ALTA') ?>:</li>
                     <li<?php if($form['precio_alta']->hasError()) echo ' class="error_list"' ?>><?php echo $form['precio_alta']->render(); ?></li>
                     <li<?php if($form[$sf_user->getCulture()]['descripcion']->hasError()) echo ' class="error_list"' ?> style="font-family:'BelloProRegular';"><?php echo __('Submit_Description') ?></li>
                     <li<?php if($form[$sf_user->getCulture()]['descripcion']->hasError()) echo ' class="error_list"' ?>><?php echo $form[$sf_user->getCulture()]['descripcion']->render(); ?></li>
                     <li><button class="submit" type="submit"><?php echo __('Submit_Boton') ?></button></li>
					 
                 </div>
                 <div class="campos-right-right">
                   <li<?php if($form['md_locacion_id']->hasError()) echo ' class="error_list"' ?>><?php echo __('Submit_CITY') ?>:</li>
                   <li class="dropdown<?php if($form['md_locacion_id']->hasError()) echo ' error_list' ?>"><?php echo $form['md_locacion_id']->render(); ?></li>
                   <li<?php if($form['precio_baja']->hasError()) echo ' class="error_list"' ?>><?php echo __('Submit_PRECIO TEMPORADA BAJA') ?>:</li>
                   <li<?php if($form['precio_baja']->hasError()) echo ' class="error_list"' ?>><?php echo $form['precio_baja']->render(); ?></li>
                 </div>
             </div>
						<?php if($form->hasErrors()): ?>
						<div class="clear"></div>
											<ul class="error_list">
						<?php foreach($form->getFormattedErrors() as $error)
							echo '<li>' . $error . '</li>';
						?>
											</ul>
						<?php endif; ?>
        </form>
		<div class="clear"></div>
		<hr/>
		<?php echo $form; ?>
		<div class="clear"></div>
				<script>
					function submitPropertyForm(){
						if($('#user_new_form').length>0){
							registerNewUser($('#user_new_form'));
							return false;	
						}
					}
					$('.buttons button').click(function(){
						$('.buttons button').removeClass('full-press comission-press');
						if($(this).attr('rel') == 'fullservice')
							$(this).addClass('full-press');
						else
							$(this).addClass('comission-press');
							
						$('#md_apartamento_frontend_tipo').val($(this).attr('rel'));
					});
					//array('choices' => array('comision' => 'comision', 'fullservice' => 'fullservice'))
				</script>
    </div>    
</div>
<script>
$(document).ready(function() {
/*
	$(".mfancy").fancybox({
		'titlePosition'	:	'over',
        'onComplete'	:	function() {
            $("#fancybox-wrap").hover(function() {
                $("#fancybox-title").show();
            }, function() {
                $("#fancybox-title").hide();
            });
        }
	});
*/
});
</script>