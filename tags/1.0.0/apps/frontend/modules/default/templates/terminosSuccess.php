<?php
use_stylesheet('how-it-works');
use_helper('Text');
?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
    <li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Terminos_navegacion') ?></li>
</div> 
<?php echo include_component('locaciones','title_right'); ?>
<div class="main-content-up">
  <div class="titulo green"><?php echo __('Terminos_Titulo') ?></div>
  <div class="texto">
		<?php echo simple_format_text(__('Terminos_Texto')) ?>
	</div>
</div>