<?php use_helper("mdAsset");?>
<div class="clear"></div>
<form action="<?php echo url_for('@changePassword') ?>" method="post" id="form_change_password_ajax">
<?php //echo $form;?>
<?php //die("corregir");?>
  <div class="datos" style="padding-right:15px">
    <?php echo __('Usuario_clave actual'); ?>
    <?php echo $form['old_password']->render(); ?>
    <div class="clear"></div>
    <?php echo __('Usuario_clave') ?>
    <?php echo $form['password']->render(); ?>
    <div class="clear"></div>
    <?php echo __('Usuario_repetir clave'); ?>
    <?php echo $form['password_confirmation']->render(); ?>
  </div>
  <?php echo $form->renderHiddenFields(); ?>
  <div class="clear"></div>
  <div id="pass_error_container">
    <?php 
        $error = $form['old_password']->getError();
        if($error)
        {
            echo __("error_".$error);
        }
    ?>            
    <?php 
        $error = $form['password']->getError();
        if($error)
        {
            echo __("error_".$error);
        }
    ?>
    <?php
        $error = $form['password_confirmation']->getError();
        if($error)
        {
            echo __("error_".$error);
        }
    ?>
    </div>
  <div class="clear"></div>
  <div class="float_right">
      <div id="loader_button_change_pass" style="display: none;float: right;"><?php echo plugin_image_tag('mastodontePlugin',"md-ajax-loader.gif");?></div>
      <input type="submit" id="button_change_pass" value="<?php echo __('user_cambiarPassword') ?>" onclick="return mdUserManagementFrontend.getInstance().sendChangePassword()">
  </div>
  <div class="clear"></div>
</form>
