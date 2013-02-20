<?php
$lista = $mdGenericSale->getMdGenericSaleItem();
$item = $lista[0];
$reserva = $item->getObject();
$depto = $reserva->getmdApartamento();
use_helper('Text');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo __('Mail_Usuario Final Titulo'); ?></title>
</head>

<body style="font-family:'Courier New', Courier, monospace; color:#000; font-size:14px; margin:0px" >
<table width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">
      <?php echo image_tag('/images/cabezal_mail.jpg', array('absolute' => true, 'width' => 600, 'height' => 140)); ?>
    </td>
  </tr>
  <tr>
    <td width="20" rowspan="3">&nbsp;</td>
    <td width="560">&nbsp;</td>
    <td width="20" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>
        <?php 
        $usuario = $reserva->getMdUser();
        $usu_profile = $usuario->getMdUserProfile();

        echo __('Mail_Usuario Final Cuerpo [url_reserva] [url_apartamento]', array(
                                                                        '[url_reserva]'=>url_for('reservas/done?sale='. $mdGenericSale->getId(), array('absolute'=>true)),
                                                                        '[url_apartamento]'=>url_for('apartamento',$depto, array('absolute'=>true)),
                                    '[pago]' => round($reserva->getTotal() * 0.125, 0),
                                    '[pago_total]' => $reserva->getTotal(),
                                    '[usuario_nombre]' => $usu_profile->getName() . ' ' .$usu_profile->getLastName(),
                                    '[depto]' => $depto->getTitulo(),
                                    '[moneda]' => $reserva->getMdCurrency()->getSymbol()
                                                                        )); ?>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="5" colspan="3" bgcolor="#000000"></td>
  </tr>
</table>
</body>
</html>
