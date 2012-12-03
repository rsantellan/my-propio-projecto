<?php

// Sample PHP code to customize the a Facebook Fan Page iFrame Application
// Refer to http://www.hyperarts.com/blog/customizing-facebook-iframe-application-signed_request_reveal_tab
error_reporting(E_ALL);

require 'facebook.php';

$app_id = "471432869567191";
$app_secret = "1ed1236ea067aa4f0bb3bee7839e2f3b";
$facebook = new Facebook(array(
        'appId' => $app_id,
        'secret' => $app_secret,
        'cookie' => true
));


$signed_request = $facebook->getSignedRequest();

$page_id = $signed_request["page"]["id"];
$page_admin = $signed_request["page"]["admin"];
$like_status = $signed_request["page"]["liked"];
$country = $signed_request["user"]["country"];
$locale = $signed_request["user"]["locale"];

$signed_request = $facebook->getSignedRequest();
function parsePageSignedRequest() {
	if (isset($_REQUEST['signed_request'])) {
		$encoded_sig = null;
		$payload = null;
		list($encoded_sig, $payload) = explode('.', $_REQUEST['signed_request'], 2);
		$sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
		$data = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
		return $data;
	}
	return false; 
}

?>


<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MJF. Comunicación | Webs</title>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #333;
}
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #666;
	text-decoration: none;
}
a:visited {
	color: #666;
}
a:hover {
	color: #09C;
}
a:active {
	color: #666;
}
</style>



</head>

<body>
<div id="fb-root"></div>
    <script>
	    (function(d){
		    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement('script'); js.id = id; js.async = true;
		    js.src = "//connect.facebook.net/es_LA/all.js";
		    ref.parentNode.insertBefore(js, ref);
	    }(document));
    </script>
<?php 
if ($signed_request = parsePageSignedRequest()):
    if(!$signed_request->page->liked): ?>
	<div class="fangate"><img src="http://www.rentnchill.com/fbtab/dalemegustabo.jpg" width="790" height="790" /></div>	
    <?php else: ?>
	<table width="790" border="0" cellspacing="2" cellpadding="3">
	  <tr>
	    <td width="13">&nbsp;</td>
	    <td width="759" height="30"><span style="color:#09C"><strong>WEBS</strong></span></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.acde.org.uy" target="_blank"><strong>ACDE</strong> - www.acde.org.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.afe.com.uy" target="_blank"><strong>AFE</strong> - www.afe.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.atman.com.uy" target="_blank"><strong>Atman</strong> - www.atman.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.azulpropiedades.com.uy" target="_blank"><strong>Azul Propiedades</strong> - www.azulpropiedades.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.bcueduca.gub.uy" target="_blank"><strong>BCU Educa</strong> - www.bcueduca.gub.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.carocriado.com" target="_blank"><strong>Caro Criado</strong> - www.carocriado.com</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.cmroosevelt.com.uy" target="_blank"><strong>Consultorios Médicos Roosevelt</strong> - www.cmroosevelt.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.colegiodeabogados.org" target="_blank"><strong>Colegio de abogados</strong> - www.colegiodeabogados.org</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.intermezzo.com.uy" target="_blank"><strong>Intermezzo</strong> - www.intermezzo.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.fenixfilms.net" target="_blank"><strong>Fénix Films</strong> - www.fenixfilms.net</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy" target="_blank"><strong>Medicina Personalizada</strong> - www.mp.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.oyenard.com" target="_blank"><strong>Oyenard Gourmet Catering</strong> - www.oyenard.com</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.pueblobarrancas.com" target="_blank"><strong>Pueblo Barrancas</strong> - www.pueblobarrancas.com</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.quatromanos.com.uy" target="_blank"><strong>Quatromanos</strong> - www.quatromanos.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.semm.com.uy" target="_blank"><strong>SEMM</strong> - www.semm.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.telefonica.com.uy"><strong>Telefónica</strong> - www.telefonica.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://mi.parlamento.gub.uy" target="_blank"><strong>Parlamento de los niños</strong> - mi.parlamento.gub.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://jovenes.parlamento.gub.uy" target="_blank"><strong>Jóvenes Participan</strong> - jovenes.parlamento.gub.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www0.parlamento.gub.uy/htmlstat/MJFConcursosCSS2012/index.html" target="_blank"><strong>Concursos Parlamento</strong> - www.parlamento.gub.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.phiphitoys.com" target="_blank"><strong>PhiPhi Toys</strong> - www.phiphitoys.com</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.vinosuy.com" target="_blank"><strong>Vinos Uy</strong> - www.vinosuy.com</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.derechos-contribuyente.com.uy" target="_blank"><strong>Derechos Contribuyente</strong> - www.derechos-contribuyente.com.uy</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.nataliaxaubet.com" target="_blank"><strong>Natalia Xaubet</strong> - www.nataliaxaubet.com</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td height="30"><span style="color:#09C"><strong>MINISITES</strong></span></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy/concursodibujo/" target="_blank"><strong>MP Concurso Dibujo 2009</strong> - www.mp.com.uy/concursodibujo/</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy/concursodibujo2010/" target="_blank"><strong>MP Concurso Dibujo 2010</strong> - www.mp.com.uy/concursodibujo2010/</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy/concursodibujo2011/" target="_blank"><strong>MP Concurso Dibujo 2011</strong> - www.mp.com.uy/concursodibujo2011/</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy/concursofotografia/" target="_blank"><strong>MP Concurso Fotografía 2009</strong> - www.mp.com.uy/concursofotografia/</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy/concursofotografia2011/" target="_blank"><strong>MP Concurso Fotografía 2011</strong> - www.mp.com.uy/concursofotografia2011/</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy/MPSunset2009/" target="_blank"><strong>MP Sunset 2009</strong> - www.mp.com.uy/MPSunset2009/</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy/MPSunset2010/" target="_blank"><strong>MP Sunset 2010</strong> - www.mp.com.uy/MPSunset2010/</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.mp.com.uy/MPSunset2011/" target="_blank"><strong>MP Sunset 2011</strong> - www.mp.com.uy/MPSunset2011/</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	  </tr>
	</table>

<?php endif; 
endif;
?>
</body>







