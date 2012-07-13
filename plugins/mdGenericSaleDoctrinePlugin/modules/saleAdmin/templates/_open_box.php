<div ajax-url="<?php echo url_for('saleAdmin/closedBox').'?id=' . $object->getId() ?>">
  
    <?php include_partial('saleAdmin/sale_basic_info', array('mdSale' => $object)) ?>
    
    <div class="clear"></div>
    <div style="float: right" id="md_user_save_cancel_button">
      <a class="" href="javascript:void(0);" onclick="mastodontePlugin.UI.BackendBasic.getInstance().close();"><?php echo __('mdUserDoctrine_text_cancel') ?></a>
    </div>
</div>
