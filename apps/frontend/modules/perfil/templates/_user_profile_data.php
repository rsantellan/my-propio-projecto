<div class="datos" style="padding-right:50px"><?php echo __('Usuario_Nombre') ?>: 
  <label>
    <?php echo $profile->getName(); ?>
  </label>
</div>
<div class="datos" style="padding-right:50px">
  <?php echo __('Usuario_apellido') ?>: 
  <label>
    <?php echo $profile->getLastName(); ?>
  </label>
</div>
<div class="datos" style="padding-right:50px">
  <?php echo __('Usuario_Telefono') ?>: 
  <label>
    <?php echo $profile->getCity(); ?>
  </label>
</div>
<div class="datos"style="padding-right:50px"><?php echo __('Usuario_Pais') ?>: 
  <label>
    <?php
    echo sfCultureInfo::getInstance()->getCountry($profile->getCountryCode());
    ?>
  </label>
</div>