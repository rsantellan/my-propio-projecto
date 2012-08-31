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
<style type="text/css">
body,td,th {
	font-family: "Courier New", Courier, monospace;
	font-size: 12px;
	color: #000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #3DA333;
	text-decoration: none;
}
a:visited {
	color: #3DA333;
	text-decoration: none;
}
a:hover {
	color: #7FB61A;
	text-decoration: none;
}
a:active {
	color: #3DA333;
	text-decoration: none;
}
</style>
</head>

<body>
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
      <?php echo simple_format_text(__('Mail_Admin Final Cuerpo')); ?>      
    </td>
  </tr>
  <tr>
    <td>
        <?php echo $depto->getmdLocacion()->getNombre() ?>
    </td>
  </tr>
  <tr>
    <td>
      <b>
        <?php echo __('Mail_Admin Final Apartamento'); ?>
      </b>
    </td>
  </tr>
  <tr>
    <td>
      <a href="<?php echo url_for('apartamento',$depto, array('absolute'=>true)) ?>"><?php echo $depto->getTitulo() ?></a>
    </td>
  </tr>
  <tr>
    <td>
      <b>
        <?php echo __('Mail_Admin Final Fecha'); ?>
      </b>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $reserva->getDateTimeObject('fecha_desde')->format('Y/m/d') ?> - 
      <?php echo $reserva->getDateTimeObject('fecha_hasta')->format('Y/m/d') ?></a>
    </td>
  </tr>
  <tr>
    <td>
      <b>
        <?php echo __('Mail_Admin Final Usuario'); ?>
      </b>
    </td>
  </tr>
  <tr>  
    <td>
      <a href="<?php echo url_for('profile',$depto->getMdUser(),array('absolute'=>true)) ?>">
        <?php echo $depto->getMdUser()->getMdUserProfile()->getName() . ' ' .$depto->getMdUser()->getMdUserProfile()->getLastName()?>
      </a>
    </td>
  </tr>
  <tr>
    <td>
      <b>
        <?php echo __('Mail_Admin Final Email'); ?>
      </b>
    </td>
  </tr>
  <tr>  
    <td>
      <a href="mailto:<?php echo $depto->getMdUser()->getEmail()?>">
        <?php echo $depto->getMdUser()->getEmail()?></a>
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
