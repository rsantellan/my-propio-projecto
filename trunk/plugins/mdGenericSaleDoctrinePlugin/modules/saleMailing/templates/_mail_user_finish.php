<?php
  /*
   * $status: estado de la confirmacion.
   * Valores posibles: 2 -> aceptado
   *                   3 -> rechazado
   */
?>
<html>
<body>
    <title><?php echo __('Mail_Titulo respuesta confirmacion '); ?></title>
    <table width="732" cellpadding="0" cellspacing="0" align="center">
    	<tr>
          <td><?php echo image_tag('/images/header-email.jpg', array('absolute' => true, 'size' => '732x99')); ?></td>
        </tr>
        <tr>
          <td><b style="font-family:Arial; color:#434a4e; font-size:18px; padding-left:24px;"><?php echo __('Mail_Respuesta a solicitud de pago'); ?></b></td>
        </tr>
        <tr><td height="10"></td></tr>
        <tr>
          <td style="color:#414141; padding-left:24px; font-family:arial; font-size:12px">
            <?php echo __('Mail_Respuesta pago ' . str_replace(array('2', '3'), array('aceptado', 'rechazado'), $status)); ?>
          </td>
        </tr>
        <tr><td height="20"></td></tr>
        <tr><td height="2" bgcolor="#CCCCCC"></td></tr>
    </table>
</body>
</html>