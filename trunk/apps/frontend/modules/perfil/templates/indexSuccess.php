<?php
use_stylesheet('perfil');
use_helper("mdAsset");



$profile = $mdUser->getMdUserProfile();

if ($sf_user->isAuthenticated() && $sf_user->getMdUserId() == $mdUser->getId())
{
  use_plugin_javascript("mdUserDoctrinePlugin", "mdUserManagmentFrontend.js", "last");
  include_partial('mdMediaContentAdmin/javascriptInclude');
  //Tengo que agregar fancybox
  use_plugin_stylesheet('mastodontePlugin', '../js/fancybox/jquery.fancybox-1.3.1.css');
  use_plugin_javascript('mastodontePlugin','fancybox/jquery.fancybox-1.3.1.pack.js','last');
}
?>
<div class="title">
  <li><img src="/images/folder.png" width="15" height="12" /></li>
  <li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Global_Home') ?></a></li>
  <li>/</li>
  <li class="current"><?php echo __('Usuario_Perfil navegacion') ?></li>
</div> 
<?php echo include_component('locaciones', 'title_right'); ?>
<div class="main-content-up">
  <div class="col-left">
    <div class="perfil">

      <h1><?php echo $profile->getName() ?> <?php echo $profile->getLastName() ?></h1>
      <?php if ($sf_user->isAuthenticated() && $sf_user->getMdUserId() == $mdUser->getId()): ?>
        <div class="info-profile">
          <img src="/images/perfil.png" width="17" height="21" />Info
        </div>
		<div id="image_container">
		  <img src="/images/profile.png" height="180" width="180" />
		</div>
		<div class="md_blocks">
			<h2 class="float_left"><?php echo __('Usuario_cambiar imagen'); ?></h2>
			<div class="float_left">
				<a id="opener-el" class="iframe">
				  <?php echo image_tag ( '/mastodontePlugin/images/agregar.jpg' )?>
				</a>
			</div>
			<div class="clear"></div>
		</div>
        <div class="datos" style="padding-right:15px">
          <?php echo __('Usuario_email') ?>: 
          <label id="user_email">
            <?php echo $mdUser->getEmail(); ?>
          </label>
          <a href="javascript:void(0)" onclick="$('#user_change_email').show();"><?php echo __('Usuario_cambiar email') ?></a>
        </div>
        <div id="user_change_email" class="hidden_div">
          <?php include_component("mdUserManagementFrontend", "changeEmail"); ?>
        </div>
        <?php
        $profile = $mdUser->getMdUserProfile();
        ?>
        <div id="user_real_data">
          <?php include_partial('perfil/user_profile_data', array('profile'=> $profile));?>
          
        </div>     
        <div class="clear"></div>
        <a href="javascript:void(0)" onclick="$('#user_change_data').show();"><?php echo __('Usuario_cambiar datos') ?></a>
          
        <div class="clear"></div>    
        <div id="user_change_data" class="hidden_div">
          <?php include_component("mdUserManagementFrontend", "changeUserProfile"); ?> 
        </div>

        <div class="datos"><?php echo __('Usuario_clave') ?>: 
          <label>*******</label>
          <a href="javascript:void(0)" onclick="$('#user_change_pass').show();"><?php echo __('Usuario_cambiar password') ?></a>
        </div>
        <div id="user_change_pass" class="hidden_div">
          <?php include_component("mdUserManagementFrontend", "changePassword"); ?>
        </div>
        <div class="clear"></div>
  <!--            <button class="save" type="button"><?php echo __('Usuario_Save') ?></button>-->
		
	 <!--
	  Aca inicializo el objeto para subir imagenes
	 -->
 <script type="text/javascript">
  $(document).ready(function() {  

  initializeLightBox('<?php echo $profile->getId(); ?>', '<?php echo $profile->getObjectClass(); ?>', MdAvatarAdmin.getInstance().getDefaultAlbumId());
  });
  </script>
      <?php endif; ?>
    </div>
    <div class="separator" style="margin-left:15px"><img width="707" height="7" src="/images/separator2.png"></div>
    <?php if ($deptos and count($deptos) > 0): ?>
      <div class="properties">
        <img src="/images/house.png" width="21" height="17" /> 
        <div class="propiedad"><?php echo __('Usuario_Properties') ?></div>
        <?php foreach ($deptos as $depto): ?>
          <div class="my-properties">
            <?php if ($sf_user->isAuthenticated() and $depto->getmdUserId() == $sf_user->getMdUserId()): ?>
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
  </div>
  <div class="col-right">
    <div class="propiedades">
      <div class="propiedad"><?php echo __('Usuario_Properties') ?></div>
    </div>   
    <?php if ($reservados and count($reservados) > 0): ?>
      <div class="reservacion"><?php echo __('Usuario_Properties Reserved') ?></div>
      <?php foreach ($reservados as $depto): ?>
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
    <?php if ($visitados and count($visitados) > 0): ?>
      <div class="reservacion"><?php echo __('Usuario_Properties Visited') ?></div>
      <?php foreach ($visitados as $depto): ?>
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