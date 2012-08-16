<div class='reserva_usuario'>
  <div class='reserva_imagen_usuario'>
    <?php $hasImage = false; ?>
    <?php $mdUserProfile = $object->getMdUserProfile(); ?>
    <?php if ($mdUserProfile): ?>
      <img id="user_<?php echo $object->getId() ?>" src="<?php echo $mdUserProfile->retrieveAvatar(array(mdWebOptions::WIDTH => 160, mdWebOptions::HEIGHT => 160, mdWebOptions::CODE => mdWebCodes::RESIZE)); ?>" />
      <?php $hasImage = true; ?>
    <?php endif; ?>
    <?php if (!$hasImage): ?>
      <?php use_helper('mdAsset'); ?>
      <?php echo plugin_image_tag('mdUserDoctrinePlugin', 'md_user_image.jpg'); ?>            
    <?php endif; ?>
  </div>
  <div class='reserva_datos_usuario'>
    <span>
      <?php echo __('mdUserDoctrine_text_email') ?>:<strong><?php echo $object->getEmail(); ?></strong>
    </span>
    <div class="clear"></div>
    <?php $passport = $object->retrieveMdPassport();?>
    <span>
      <?php echo __('mdUserDoctrine_text_username') ?>:<strong><?php echo $passport->getUsername(); ?></strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('mdUserDoctrine_text_IsActive') ?>:<strong>
        <?php 
        if($passport->getAccountActive())
        {
          echo __('usuario_la cuenta esta activa');
        }
        else
        {
          echo __('usuario_la cuenta no esta activa');
        }
        
        ?>
      </strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('mdUserDoctrine_text_IsBlocked') ?>:<strong>
        <?php 
        if($passport->getAccountBlocked())
        {
          echo __('usuario_la cuenta esta bloqueada');
        }
        else
        {
          echo __('usuario_la cuenta no esta bloqueada');
        }
        
        ?>
      </strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('mdUserDoctrine_text_name') ?>:<strong><?php echo $mdUserProfile->getName(); ?></strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('mdUserDoctrine_text_lastname') ?>:<strong><?php echo $mdUserProfile->getLastName(); ?></strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('mdUserDoctrine_text_city') ?>:<strong><?php echo $mdUserProfile->getCity(); ?></strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('mdUserDoctrine_text_country') ?>:<strong><?php echo sfCultureInfo::getInstance()->getCountry($mdUserProfile->getCountryCode()); ?></strong>
    </span>
  </div>
</div>
