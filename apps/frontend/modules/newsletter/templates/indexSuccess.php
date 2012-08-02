<?php
slot('mdContact', true);

use_stylesheet('novedades.css');

?>


<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Contacto_Navegacion') ?></li>
</div> 
 <div class="main-content-up">
	 <div class="col-right">
			<?php include_component('locaciones','imagen') ?>
   </div>
  
     <div class="col-left">
         <div class="titulo green"><?php echo __('Contacto_Titulo') ?></div>
        <form name="<?php echo $form->getName();?>" class="form-send" method="POST" action="<?php echo url_for('@mdContact') ?>">
	            <?php echo $form->renderHiddenFields() ?>
              <div class="campos-left">
                  <li><?php echo $form['nombre']->renderLabel() ?></li>
                  <li><?php echo $form['nombre']->render(array('tabIndex'=>1)) ?></li>
                  <li><?php echo $form['email']->renderLabel() ?></li>
                  <li><?php echo $form['email']->render(array('tabIndex'=>2)) ?></li>
                  
                  <div class="div-send"><button class="send" type="submit" tabIndex="4"><?php echo __('Contacto_Enviar') ?></button></div>
              </div>
              
							<div class="clear"></div>
							<ul class="error_list">
								<?php foreach($form->getFormattedErrors() as $error): ?>
								<li><?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
							<div class="clear"></div>
         </form>
         <div class="property">
             <li><a href="<?php echo url_for('@submit') ?>"><?php echo __('Global_submit your property') ?></a></li>
             <li><a href="<?php echo url_for('@submit') ?>"><img src="/images/property.png" width="41" height="39" /></a></li>
         </div> 
     </div>
 </div>
