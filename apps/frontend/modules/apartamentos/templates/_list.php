                 	<div class="resultado">
                    	<div class="propiedad-img">
													<a href="<?php echo url_for('apartamento',$apartamento); ?>">
                        	<img src="<?php echo $apartamento->retrieveAvatar(array(mdWebOptions::WIDTH =>90 , mdWebOptions::HEIGHT =>90 , mdWebOptions::CODE => mdWebCodes::CROPRESIZE )) ?>" width="90" height="90" />
													</a>
                        </div>
                        <div class="info">
                        	<div class="detalles">
                            	<div class="title-detalles"><a href="<?php echo url_for('apartamento',$apartamento); ?>"><?php echo $apartamento->getTitulo() ?></a></div>
                                <div class="sub-title-detalles"><?php echo $apartamento->getCopete()?></div>
                            </div>
                            <div class="precio">
                            	<div class="title-precio"><?php echo mdCurrencyHandler::getCurrentSymbol() ?> <?php echo $apartamento->getPrecio() ?></div>
                                <div class="sub-title-precio"><?php echo __('Apartamento_per night') ?></div>
                            </div>
                        </div>
                    </div>
