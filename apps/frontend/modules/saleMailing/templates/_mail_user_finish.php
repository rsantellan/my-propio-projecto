<?php
$lista = $mdGenericSale->getMdGenericSaleItem();
$item = $lista[0];
$reserva = $item->getObject();
$depto = $reserva->getmdApartamento();
use_helper('Text');
?>
<html>
<body style="background-color:#F5F5F5">
    <title><?php echo __('Mail_Usuario Final Titulo'); ?></title>
    <table width="732" cellpadding="0" cellspacing="0" align="center">
    	<tr>
          <td><?php echo image_tag('/images/header-email.png', array('absolute' => true)); ?></td>
        </tr>
        <tr style="background-color:#FFFFFF">
          <td><b style="font-family:Arial; color:#00B800; font-size:18px; padding-left:24px; padding-top:20px; padding-bottom:10px">
					<?php echo __('Mail_Usuario Final Titulo'); ?></b>
					</td>
        </tr>
        <tr style="background-color:#FFFFFF"><td height="10"></td></tr>
        <tr style="background-color:#FFFFFF">
          <td style="color:#414141; padding-left:24px; font-family:arial; font-size:12px">
            <?php echo simple_format_text(__('Mail_Usuario Final Cuerpo [url_reserva] [url_apartamento]', array(
									'[url_reserva]'=>url_for('reservas/done?sale='. $mdGenericSale->getId(), array('absolute'=>true)),
									'[url_apartamento]'=>url_for('apartamento',$depto, array('absolute'=>true)),
									))); ?>
          </td>
        </tr>
        <tr style="background-color:#FFFFFF"><td height="20"></td></tr>
        <tr><td height="2" bgcolor="#72D400"></td></tr>
    </table>
</body>
</html>