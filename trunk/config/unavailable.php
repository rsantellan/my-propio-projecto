<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $path = preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : '')) ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rent n' Chill | En mantenimiento</title>
<style type="text/css">
body {
	background-color: #F5F5F5;
	margin: 0px;
	height: 100%;
	width: 100%;
}
body,td,th {
	font-family: "Courier New", Courier, monospace;
	font-size: 12px;
	color: #666;
}
html {
	height: 100%;
	width: 100%;
}
#all {
	height: 100%;
	width: 100%;
}
#tabla {
	background-image: url(<?php echo $path ?>/images/enmantenimiento.png);
	height: 450px;
	width: 450px;
	background-repeat: no-repeat;
}
.en {
	font-size: 16px;
	font-weight: bold;
}
a {
	font-size: 12px;
	color: #72D400;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #72D400;
}
a:hover {
	text-decoration: none;
	color: #00B800;
}
a:active {
	text-decoration: none;
	color: #72D400;
}
</style>
</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" id="all">
  <tr>
    <td align="center" valign="middle"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0" id="tabla">
      <tr>
        <td height="229" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="93" align="center" class="en">SITIO WEB EN MANTENIMIENTO</td>
      </tr>
      <tr>
        <td align="center"> <a href="mailto:info@rentnchill.com">info@rentnchill.com</a><br />
          Tels.:(00598) 9370 2506 / 9456 3139 / 4277 3278<br />
          Punta del Este, Uruguay</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
