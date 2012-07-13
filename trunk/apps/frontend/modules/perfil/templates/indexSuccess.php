<?php
use_stylesheet('perfil');
$profile = $mdUser->getMdUserProfile();
?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Usuario_Perfil navegacion') ?></li>
</div> 
<?php echo include_component('locaciones','title_right'); ?>
<div class="main-content-up">
    <div class="col-left">
    	<div class="perfil">
        	<h1><?php echo $profile->getName() ?> <?php echo $profile->getLastName() ?></h1>
<?php if($sf_user->isAuthenticated() and $sf_user->getMdUserId()==$mdUser->getId()): ?>
            <div class="info-profile">
							<img src="/images/perfil.png" width="17" height="21" />Info
						</div>
        		<img src="/images/profile.png" height="180" width="180" />
            <div class="datos" style="padding-right:50px"><?php echo __('Usuario_Nombre') ?>: <input  /></div>
            <div class="datos" style="padding-right:50px"><?php echo __('Usuario_Telefono') ?>: <input  /></div>
            <div class="datos" style="padding-right:15px"><?php echo __('Usuario_email') ?>: <input  /></div>
            <div class="datos"><?php echo __('Usuario_clave') ?>: <input  /></div>
            <div class="datos"style="padding-right:50px"><?php echo __('Usuario_Pais') ?>: <input  /></div>
            <button class="save" type="button"><?php echo __('Usuario_Save') ?></button>
<?php endif; ?>
        </div>
        <div class="separator" style="margin-left:15px"><img width="707" height="7" src="/images/separator2.png"></div>
<?php if($deptos and count($deptos)>0): ?>
        <div class="properties">
        	<img src="/images/house.png" width="21" height="17" /> 
            <div class="propiedad"><?php echo __('Usuario_Properties') ?></div>
<?php foreach($deptos as $depto): ?>
            <div class="my-properties">
	<?php if($sf_user->isAuthenticated() and $depto->getmdUserId() == $sf_user->getMdUserId()): ?>
							<a href="<?php echo url_for('apartamento_edit', $depto) ?>">
	<?php else: ?>
							<a href="<?php echo url_for('apartamento', $depto) ?>">
	<?php endif; ?>
            	<img src="<?php echo $depto->retrieveAvatar(array(mdWebOptions::WIDTH => 100, mdWebOptions::HEIGHT => 100, mdWebOptions::CODE => mdWebCodes::RESIZECROP)); ?>" width="100" height="100" />
                <div class="tipo"><?php echo $depto->getTitulo(); ?></div>
                <div class="servicios"><?php echo $depto->getCopete() ?></div>
							</a>
            </div>
<?php endforeach; ?>
        </div>
        <div class="separator" style="margin-left:15px"><img width="707" height="7" src="/images/separator2.png"></div>
<?php endif; ?>
<!--
         <div class="buttons">
            <button class="current-messages" type="button">Messages</button>

            <button class="reviews" type="button">Reviews</button>

            </div>
            <div class="description-text">
            	<div class="comment comment-current">
                	<div class="img"><img src="/images/person.png" width="50" height="50" /></div>
                    <div class="name">MARTIN PÉREZ</div>
                    <div class="icon"><img src="/images/sobre.png" width="21" height="16" /></div>
                    <div class="date">Posted 21/09/2011</div>
                    <div class="comentario">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc adipiscing posuere placerat. Proin sed pretium odio. Donec non dolor a lorem mollis egestas. Donec ac eros metus. Maecenas sollicitudin eleifend purus, a fermentum ante fringilla in. Nullam non leo massa, at hendrerit lectus. Maecenas pharetra blandit sem, id varius libero vulputate quis. Etiam sit amet velit felis.</div>
                </div>
                <div class="comment">
                	<div class="img"><img src="/images/person.png" width="50" height="50" /></div>
                    <div class="name">MARTIN PÉREZ</div>
                    <div class="icon"><img src="/images/sobre.png" width="21" height="16" /></div>
                    <div class="date">Posted 21/09/2011</div>
                    <div class="comentario">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc adipiscing posuere placerat. Proin sed pretium odio. Donec non dolor a lorem mollis egestas. Donec ac eros metus. Maecenas sollicitudin eleifend purus, a fermentum ante fringilla in. Nullam non leo massa, at hendrerit lectus. Maecenas pharetra blandit sem, id varius libero vulputate quis. Etiam sit amet velit felis.</div>
                </div>
                <div class="comment">
                	<div class="img"><img src="/images/person.png" width="50" height="50" /></div>
                    <div class="name">MARTIN PÉREZ</div>
                    <div class="icon"><img src="/images/sobre.png" width="21" height="16" /></div>
                    <div class="date">Posted 21/09/2011</div>
                    <div class="comentario">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc adipiscing posuere placerat. Proin sed pretium odio. Donec non dolor a lorem mollis egestas. Donec ac eros metus. Maecenas sollicitudin eleifend purus, a fermentum ante fringilla in. Nullam non leo massa, at hendrerit lectus. Maecenas pharetra blandit sem, id varius libero vulputate quis. Etiam sit amet velit felis.</div>
                </div>
							</div>
	-->
    </div>
    <div class="col-right">
    	<div class="propiedades">
            <div class="propiedad"><?php echo __('Usuario_Properties') ?></div>
        </div>   
<?php if($reservados and count($reservados)>0): ?>
        <div class="reservacion"><?php echo __('Usuario_Properties Reserved') ?></div>
<?php foreach($reservados as $depto): ?>
        <div class="reserved">
					<a href="<?php echo url_for('apartamento', $depto) ?>">
           	<img src="<?php echo $depto->retrieveAvatar(array(mdWebOptions::WIDTH => 50, mdWebOptions::HEIGHT => 50, mdWebOptions::CODE => mdWebCodes::RESIZECROP)); ?>" width="50" height="50" />
            <div class="tipo"><?php echo $depto->getTitulo() ?></div>
            <div class="servicios"><?php echo $depto->getCopete() ?></div>
					</a>
        </div> 
<?php endforeach; ?>
        <div class="separator" style="float: left; margin: 15px 0 15px 15px;"><img width="269" height="7" src="/images/separator2.png"></div>
<?php endif ?>
<?php if($visitados and count($visitados)>0): ?>
        <div class="reservacion"><?php echo __('Usuario_Properties Visited') ?></div>
<?php foreach($visitados as $depto): ?>
        <div class="reserved">
					<a href="<?php echo url_for('apartamento', $depto) ?>">
          	<img src="<?php echo $depto->retrieveAvatar(array(mdWebOptions::WIDTH => 50, mdWebOptions::HEIGHT => 50, mdWebOptions::CODE => mdWebCodes::RESIZECROP)); ?>" width="50" height="50" />
            <div class="tipo"><?php echo $depto->getTitulo() ?></div>
            <div class="servicios"><?php echo $depto->getCopete() ?></div>
					</a>
        </div> 
<?php endforeach; ?>
        <div class="separator" style="float: left; margin: 15px 0 15px 15px;"><img width="269" height="7" src="/images/separator2.png"></div>
<?php endif; ?>

    </div>
</div>