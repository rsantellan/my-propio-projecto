<?php
use_stylesheet('bookit.css');

use_stylesheet('../fancybox/jquery.fancybox-1.3.4.css');
use_javascript('../fancybox/jquery.fancybox-1.3.4.pack.js');

use_javascript('regiterUser.js');
use_javascript('jquery.scrollTo-min.js');
?>

				<div class="title">
            <li><img src="/images/folder.png" width="15" height="12" /></li>
						<li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
            <li>/</li>
            <li class="current"><?php echo __('Reserva_Done navegacion') ?></li>
        </div> 
				<?php echo include_component('locaciones','title_right', array('mdLocacionId'=>$depto->getmdLocacionId())); ?>
        <div class="main-content-up">
            <div class="col-left">
            	<div class="tourist">
                	<div class="info-tourist"><?php echo __('Reserva_Done Titulo') ?></div>
                    <div class="info-bookit">
                    	<ul>
                            <li><?php echo __('Reserva_title') ?>:<span> <a href="<?php echo url_for('apartamento',$depto); ?>"><?php echo $depto->getTitulo() ?></a></span></li>
                            <li><?php echo __('Reserva_description') ?>:<span> <?php echo $depto->getCopete() ?></span></li>
                            <li><?php echo __('Reserva_city') ?>:<span> <?php echo $depto->getmdLocacion()->getNombre() ?></span></li>
                            <li><?php echo __('Reserva_guests') ?>:<span> <?php echo $reserva->getCantidadPersonas() ?></span></li>
                            <li><?php echo __('Reserva_nights') ?>:<span> <?php echo $noches ?></span></li>
                        </ul>
                        <ul>
                            <li><?php echo __('Reserva_total') ?></li>
                            <li class="prezio green"><?php echo $reserva->getmdCurrency()->getSymbol() ?> <?php echo round($reserva->getTotal(),0); ?></li>
                        </ul>
                    </div>
                    <div class="line2"></div>
                    <div class="send-log">
                     <div class="div-send">
                         <li style="font-size:36px; font-family: 'BelloScript'; display:list-item;"><?php echo __('Reserva_Done What happend next?') ?></li>
                     </div>
											<div class="campos-right">
												<?php if($depto->getTipo() == 'comission'): $user = $depto->getmdUser();?>
												<div style="font-family: 'CourierRegular'; font-size:11px; display:list-item;">
													<?php echo __('Reserva_Done explicacion comission') ?>
												</div>
												<div class="info-bookit campos-right-left">
		                    	<ul>
		                            <li><?php echo __('Usuario_nombre') ?>:<span> <?php echo $user->getMdUserProfile()->getName(); ?></span></li>
		                            <li><?php echo __('Usuario_apellido') ?>:<span> <?php echo $user->getMdUserProfile()->getLastName() ?></span></li>
		                            <li>Usuario_email:<span> <?php echo $user->getEmail() ?></span></li>
		                        </ul>
												</div>
												<div class="campos-right-right">
													<ul>
	                           <li>
															<button class="contact" type="button" href="<?php echo url_for('profile',$depto->getMdUser()) . '#message'; ?>"><?php echo __('Usuario_Contact') ?></button>
														</li>
													</ul>
												<div>
											<?php else: ?>
												<div style="font-family: 'CourierRegular'; font-size:11px; display:list-item;">
													<?php echo __('Reserva_Done explicacion fullservice') ?>
												</div>
												<div class="campos-right-left">
													<ul>
	                           <li>
															<a href="<?php echo url_for('@funcionamiento'); ?>"><?php echo __('Reserva_Done How it works') ?>?!</a>
														</li>
													</ul>
												</div>
												<div class="campos-right-right">
													<ul>
	                           <li>
															    <button class="contact" type="button" href="<?php echo url_for('@contacto')?>"><?php echo __('Global_Contact') ?></button>
														</li>
													</ul>
												<div>
														
												
												<?php endif; ?>
										</div>
                </div>
            </div>
        </div>
