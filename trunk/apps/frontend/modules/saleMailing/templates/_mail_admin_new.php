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
<title><?php echo __('Mail_Admin Final Titulo', array('[tipo]'=>$depto->getTipo())); ?></title>
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
        echo __('Mail_Admin Final Cuerpo', array(
        '[locacion]' => $depto->getmdLocacion()->getNombre(),
        '[url]' => url_for('apartamento',$depto, array('absolute'=>true)),
        '[depto]' => $depto->getTitulo(),
        '[fecha_desde]' => $reserva->getDateTimeObject('fecha_desde')->format('Y/m/d'),
        '[fecha_hasta]' => $reserva->getDateTimeObject('fecha_hasta')->format('Y/m/d'),
        '[usuario_url]' => url_for('profile',$usuario,array('absolute'=>true)),
        '[usuario_nombre]' => $usu_profile->getName() . ' ' .$usu_profile->getLastName(),
        '[usuario_email]' => $usuario->getEmail(),
        '[pago]' => round($reserva->getTotal() * 0.125, 0),
        '[pago_total]' => $reserva->getTotal()
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
