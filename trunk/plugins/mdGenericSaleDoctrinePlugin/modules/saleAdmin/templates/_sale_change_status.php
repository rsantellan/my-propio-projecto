<div class='change_status' <?php if(!$visible) echo 'style="display: none;"'?>>
  <?php if(!$first): ?>
  <a href="<?php echo url_for('mdSale/changeStatus');?>" onclick="return changeStatus(<?php echo $mdSaleId?>,<?php echo $mdProfileId?>, <?php echo ($state - 1)?>,false, this)"><?php echo __('mdShoppingSalePlugin_text_previousStatus')?></a>
  <?php endif; ?>
  <?php if(!$last): ?>
  <a href="<?php echo url_for('mdSale/changeStatus');?>" onclick="return changeStatus(<?php echo $mdSaleId?>,<?php echo $mdProfileId?>, <?php echo ($state + 1)?>,true, this)"><?php echo __('mdShoppingSalePlugin_text_nextStatus')?></a>
  <?php endif;?>
</div>
