<?php
use_stylesheet('how-it-works');
use_stylesheet('../fancybox/jquery.fancybox-1.3.4.css');
use_javascript('../fancybox/jquery.fancybox-1.3.4.pack.js');
use_helper('Text');
?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
    <li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Funcionamiento_navegacion') ?></li>
</div> 
<?php echo include_component('locaciones','title_right'); ?>
<div class="main-content-up">
    <div class="col-left">
        <div class="titulo green"><?php echo __('Funcionamiento_titulo') ?></div>
        <div class="sub-title"><?php echo __('Funcionamiento_Find place') ?></div>
        <div class="texto">
        	<img src="/images/lupa.png" width="41" height="41" />
            <div style="width:560px">
                <div>
									<a href="#data3" class="fancy texto-titulo" style="color:#000; text-decoration:none;">
										<?php echo __('Funcionamiento_FIND YOUR SPACE') ?>
									</a>
								</div>
                <div class="texto-subtitulo"><?php echo __('Funcionamiento_Find text') ?></div>
            </div>
        </div>
        <div class="texto">
        	<img src="/images/black-hand.png" width="37" height="37" />
            <div style="width:560px">
                <div>
									<a href="#data4" class="fancy texto-titulo" style="color:#000; text-decoration:none;">
									<?php echo __('Funcionamiento_bookIt') ?>
									</a>
								</div>
                <div class="texto-subtitulo"><?php echo __('Funcionamiento_bookIt text') ?></div>
            </div>
        </div>
        <div class="div-send"><a href="<?php echo url_for('@buscador'); ?>"><button class="send" type="button"><?php echo __('Funcionamiento_Search') ?></button></a></div>
    </div>
    <div class="col-right">
        <div class="sub-title-right blue"><?php echo __('Funcionamiento_Hosting plans') ?></div>
        <div class="texto-right">
        	<img src="/images/key.png" width="48" height="40"/>
            <div>
                <a href="#data" class="fancy texto-titulo-right" style="color:#000; text-decoration:none;"><?php echo __('Funcionamiento_Full service') ?></a>
                <div class="texto-subtitulo-right"><?php echo __('Funcionamiento_Full service texto') ?></div>
            </div>
        </div>
        <div class="texto-right">
        	<img src="/images/house.png" width="48" height="40"/>
            <div>
                <a href="#data2" class="fancy texto-titulo-right" style="color:#000; text-decoration:none;"><?php echo __('Funcionamiento_comission') ?></a>
                <div class="texto-subtitulo-right"><?php echo __('Funcionamiento_comission texto') ?></div>
            </div>
        </div>
        <div class="div-submit"><a href="<?php echo url_for('@submit') ?>"><button class="submit" type="button"><?php echo __('Funcionamiento_Submit') ?></button></a></div>
    </div>
</div>
<div style="display:none">
    <div id="data">
    	<img src="/images/key.png" width="48" height="40" style="float:left"/>
        <div class="texto-titulo-right-fancy"><?php echo __('Funcionamiento_Full service') ?></div>
        <div class="texto-subtitulo-right" style="float:left">
						<?php echo simple_format_text(__('Funcionamiento_Full service modal')) ?>
            <div class="div-submit"><a href="<?php echo url_for('@submit_type?type=fullservice') ?>"><button class="submit" type="button"><?php echo __('Funcionamiento_Submit') ?></button></a></div>
            </div>
    </div>
</div>
<div style="display:none">
    <div id="data2">
    	<img src="/images/house.png" width="48" height="40" style="float:left"/>
        <div class="texto-titulo-right-fancy"><?php echo __('Funcionamiento_Comission') ?></div>
        <div class="texto-subtitulo-right" style="float:left">
					<?php echo simple_format_text(__('Funcionamiento_Comission modal')) ?>
            <div class="div-submit"><a href="<?php echo url_for('@submit_type?type=comission') ?>"><button class="submit" type="button"><?php echo __('Funcionamiento_Submit') ?></button></a></div>
            </div>
    </div>
    </div>
		<div style="display:none">
		    <div id="data3">
		    	<img src="/images/lupa.png" width="48" height="40" style="float:left"/>
		        <div class="texto-titulo-right-fancy"><?php echo __('Funcionamiento_Buscar') ?></div>
		        <div class="texto-subtitulo-right" style="float:left">
								<?php echo simple_format_text(__('Funcionamiento_Buscar modal')) ?>
		            <div class="div-submit"><a href="<?php echo url_for('@buscador'); ?>"><button class="send" type="button"><?php echo __('Funcionamiento_Search') ?></button></a></div>
		            </div>
		    </div>
		</div>
		<div style="display:none">
		    <div id="data4">
		    	<img src="/images/black-hand.png" width="48" height="40" style="float:left"/>
		        <div class="texto-titulo-right-fancy"><?php echo __('Funcionamiento_Reserva') ?></div>
		        <div class="texto-subtitulo-right" style="float:left">
							<?php echo simple_format_text(__('Funcionamiento_Reserva modal')) ?>
		            <div class="div-submit"><a href="<?php echo url_for('@buscador'); ?>"><button class="send" type="button"><?php echo __('Funcionamiento_Search') ?></button></a></div>
		            </div>
		    </div>
		    </div>
<script>
$(document).ready(function() {

	$("a.fancy").fancybox({
		'hideOnContentClick': false
	});

});
		</script>