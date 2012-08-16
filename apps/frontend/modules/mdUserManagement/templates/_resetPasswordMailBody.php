<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rent n' Chill</title>
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
      <?php echo image_tag("cabezal_mail.jpg", array("absolute" => true)); ?>
    </td>
  </tr>
  <tr>
    <td width="20" rowspan="3">&nbsp;</td>
    <td width="560">&nbsp;</td>
    <td width="20" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>
      <p><?php echo __('mdUserDoctrine_text_ResetMailTitle')?></p>
      <p><?php echo __('mdUserDoctrine_text_ResetMailFollowLink')?><br />
        <a href="<?php echo $link?>"><?php echo __('mdUserDoctrine_text_ResetHere')?></a>
        <br />
        Staff<br />
        <strong>Rent n' Chill</strong><br />
        <a href="http://www.rentnchill.com/">http://www.rentnchill.com/</a>
      </p></td>
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
