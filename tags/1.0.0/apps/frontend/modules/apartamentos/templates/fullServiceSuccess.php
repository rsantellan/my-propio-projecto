<?php
use_stylesheet('info-ciudad.css');
use_helper('Text');
?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Search_navegacion') ?></li>
</div> 
<?php echo include_component('locaciones','title_right', array('mdLocacion'=>$depto->getMdLocacion())); ?>
<div class="main-content-up">
    <div class="col-left">
    	<div class="titulo-info blue"><?php echo __('Submit_FullService Property submited') ?></div>
      <div class="sub-info green">&nbsp;</div>
        <div class="info-ciudad">
					<?php echo simple_format_text(__('Submit_FullService Texto')) ?>
				</div>
		</div>
	</div>
