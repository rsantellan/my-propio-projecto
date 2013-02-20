<div id="md_basic_<?php echo $mdSale->getId() ?>" class="md_open_object_top">
    <div class="md_blocks">
      <h2><?php echo __('mdGenericSalePlugin_Detalle'); ?></h2>
      
      <?php $mdUserProfile = $mdSale->getMdUser()->getMdUserProfile(); ?>
      
      <table width="400">
        <tr>
          <td width="140"><?php echo __('mdGenericSalePlugin_UserData'); ?></td>
          <td width="150">&nbsp;</td>
        </tr>
        <tr>
          <td><?php echo __('mdGenericSalePlugin_Id'); ?></td>
          <td><?php echo $mdSale->getMdUserId(); ?></td>
        </tr>
        <tr>
          <td><?php echo __('mdGenericSalePlugin_Name'); ?></td>
          <td><?php echo $mdUserProfile->getName(); ?></td>
        </tr>
        <tr>
          <td><?php echo __('mdGenericSalePlugin_LastName'); ?></td>
          <td><?php echo $mdUserProfile->getLastName(); ?></td>
        </tr>
        <tr>
          <td><?php echo __('mdGenericSalePlugin_Email'); ?></td>
          <td><?php echo $mdUserProfile->getMdUser()->getEmail(); ?></td>
        </tr>
        <tr>
          <td><?php echo __('mdGenericSalePlugin_Pais'); ?></td>
          <td><?php echo format_country($mdUserProfile->getCountryCode(), $sf_user->getCulture()); ?></td>
        </tr>
      </table>
      <br />
      <hr />
      <table width="400">
        <tr>
          <td width="140"><?php echo __('mdGenericSalePlugin_Pago'); ?></td>
          <td width="150">&nbsp;</td>
        </tr>
        <tr>
          <td><?php echo __('mdGenericSalePlugin_Total')?></td>
          <td><?php echo $mdSale->getPrice(); ?></td>
        </tr>
        <tr>
          <td><?php echo __('mdGenericSalePlugin_Payment Method'); ?></td>
          <td><?php echo $mdSale->getMdGenericPayment()->getMethodPay(); ?></td>
        </tr>
        <?php include_component("saleAdmin", "paymentOption", array("mdSale" => $mdSale)); ?>
      </table>

    </div>
</div>
<!--FIN ABIERTO TOP-->
