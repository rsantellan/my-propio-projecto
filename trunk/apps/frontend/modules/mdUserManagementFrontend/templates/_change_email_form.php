<?php use_helper("mdAsset");?>
<form action="<?php echo url_for('@changeEmail') ?>" method="post" id="change_email_form">
  <div class="datos" style="padding-right:15px">
    <?php echo __('Usuario_email') ?>: 
    <?php echo $form['email']->render(); ?>
    <div class="clear"></div>
    <div id="email_error_container">
    <?php 
        $error = $form['email']->getError();
        if($error)
        {
            echo __("error_".$error);
        }
    ?>
    </div>
  </div>
  <div class="float_right">
      <div id="loader_button_change_mail" style="display: none;float: right;"><?php echo plugin_image_tag('mastodontePlugin',"md-ajax-loader.gif");?></div>
      <input id="button_change_mail" type="submit" value="<?php echo __("user_changeEmail");?>" onclick="return mdUserManagementFrontend.getInstance().sendChangeEmail()">
  </div>
  <div class="clear"></div>
  <?php echo $form->renderHiddenFields(); ?>
</form>