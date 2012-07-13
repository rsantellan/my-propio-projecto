<?php if($mdSale->getMdGenericPayment()->getObjectClass() != 'mdGenericPaymentPaypal'): ?>
  <tr>
    <td><?php echo __('mdGenericSalePlugin_Code')?></td>
    <td><?php echo $used->getNote(); ?></td>
  </tr>
  <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>    
  <?php if($mdSale->getStatus() == 1): ?>
    <tr>
      <td>&nbsp;</td>
      <td>
        <form method="POST" action="<?php echo url_for("saleAdmin/changePaymentStatus");?>" onsubmit="return mdGenericSale.getInstance().changePaymentStatus(this);" > 

          <select name="status">
            <option value="-1"></option>
            <option value="3"><?php echo __("mdGenericSalePlugin_pago Rechazado");?></option>
            <option value="2"><?php echo __("mdGenericSalePlugin_pago Validado");?></option>
          </select>
          <input type="hidden" value="<?php echo $mdSale->getId();?>" name="saleId"/>
          <input type="submit" value="<?php echo __("mdGenericSalePlugin_pago Cambiar estado");?>" />
        </form>
      </td>
    </tr>
  <?php endif; ?>
<?php endif; ?>
