<?php
$lista = $mdGenericSale->getMdGenericSaleItem();
$item = $lista[0];
$reserva = $item->getObject();
$depto = $reserva->getmdApartamento();
use_helper('Text');
?>
<html>
<body style="background-color:#F5F5F5">
    <title><?php echo __('Mail_Admin Final Titulo', array('[tipo]'=>$depto->getTipo())); ?></title>
    <table width="732" cellpadding="0" cellspacing="0" align="center">
    	<tr>
          <td><?php echo image_tag('/images/header-email.png', array('absolute' => true)); ?></td>
        </tr>
        <tr style="background-color:#FFFFFF">
          <td><b style="font-family:Arial; color:#00B800; font-size:18px; padding-left:24px; padding-top:20px; padding-bottom:10px">
					<?php echo __('Mail_Admin Final Titulo', array('[tipo]'=>$depto->getTipo())); ?></b>
        </tr>
        <tr style="background-color:#FFFFFF"><td height="10"></td></tr>
        <tr style="background-color:#FFFFFF">
          <td style="color:#414141; padding-left:24px; font-family:arial; font-size:12px">
            <?php echo simple_format_text(__('Mail_Admin Final Cuerpo')); ?>
          </td>
        </tr>
        <tr style="background-color:#FFFFFF">
          <td style="color:#414141; padding-left:24px; font-family:arial; font-size:12px; padding-top:20px">
    				<table width="80%" cellpadding="10" cellspacing="0" align="center">
							<tr>
								<td with="100px"><b style="font-family:Arial; color:#00B800; font-size:13px; margin-top:10px; margin-bottom:5px">
									<?php echo __('Mail_Admin Final Locacion'); ?></b>
				        </td>
								<td>
									<?php echo $depto->getmdLocacion()->getNombre() ?>
								</td>
							</tr>
							<tr>
								<td with="100px"><b style="font-family:Arial; color:#00B800; font-size:13px; margin-top:10px; margin-bottom:5px">
									<?php echo __('Mail_Admin Final Apartamento'); ?></b>
				        </td>
								<td>
									<a href="<?php echo url_for('apartamento',$depto, array('absolute'=>true)) ?>"><?php echo $depto->getTitulo() ?></a>
								</td>
							</tr>
							<tr>
								<td with="100px"><b style="font-family:Arial; color:#00B800; font-size:13px; margin-top:10px; margin-bottom:5px">
									<?php echo __('Mail_Admin Final Fecha'); ?></b>
				        </td>
								<td>
									<?php echo $reserva->getDateTimeObject('fecha_desde')->format('Y/m/d') ?> - 
									<?php echo $reserva->getDateTimeObject('fecha_hasta')->format('Y/m/d') ?></a>
								</td>
							</tr>
							<tr>
								<td with="100px"><b style="font-family:Arial; color:#00B800; font-size:13px; margin-top:10px; margin-bottom:5px">
									<?php echo __('Mail_Admin Final Usuario'); ?></b>
				        </td>
								<td>
									<a href="<?php echo url_for('profile',$depto->getMdUser(),array('absolute'=>true)) ?>">
									<?php echo $depto->getMdUser()->getMdUserProfile()->getName() . ' ' .$depto->getMdUser()->getMdUserProfile()->getLastName()?></a>
								</td>
							</tr>
							<tr>
								<td with="100px"><b style="font-family:Arial; color:#00B800; font-size:13px; margin-top:10px; margin-bottom:5px">
									<?php echo __('Mail_Admin Final Email'); ?></b>
				        </td>
								<td>
									<a href="mailto:<?php echo $depto->getMdUser()->getEmail()?>">
									<?php echo $depto->getMdUser()->getEmail()?></a>
								</td>
							</tr>
						</table>
          </td>
        </tr>
        <tr style="background-color:#FFFFFF"><td height="20"></td></tr>
        <tr><td height="2" bgcolor="#72D400"></td></tr>
    </table>
</body>
</html>