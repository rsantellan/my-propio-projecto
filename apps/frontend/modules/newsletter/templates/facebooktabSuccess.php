<?php
use_stylesheet('https://www.rentnchill.com/css/facebooktab.css');
use_stylesheet('https://www.rentnchill.com/webfontkit-20111024-094554/stylesheet.css');
?>

<?php

// Sample PHP code to customize the a Facebook Fan Page iFrame Application
// Refer to http://www.hyperarts.com/blog/customizing-facebook-iframe-application-signed_request_reveal_tab

//require 'http://www.rentnchill.com/fbtab/facebook.php';

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
$user_has_flash_ok = false;

if($sf_user->hasFlash('ok')){
  $user_has_flash_ok = true;
  $signed_request = true;
}
else
{
  $signed_request = parsePageSignedRequest();

}
/*
var_dump($user_has_flash_ok);
echo '<hr/>';
var_dump($signed_request);
*/
?>

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
<?php if ($signed_request) {
				if(!$user_has_flash_ok && !$signed_request->page->liked) { ?>
			<div class="fangate">
			    <?php if($sf_user->getCulture() == "pt"): ?>
				<img src="http://www.rentnchill.com/fbtab/pretab-por.jpg" width="790" height="790" />
			    <?php else: ?>
				<img src="http://www.rentnchill.com/fbtab/pretab-esp.jpg" width="790" height="790" />
			    <?php endif; ?>
			</div>	
		<?php } else { ?>
        
        
<div id="fball" >
<div id="gris">
<div id="idioma"> 

<a href="https://www.rentnchill.com/pt/newsletter.php/">Portugués</a> | <a href="https://www.rentnchill.com/es/newsletter.php/">Español</a></div>
<div id="bienvenidos">
<?php echo __('novedades_facebook tab text') ?>    
</div>
<div id="fbcamp">

<form name="<?php echo $form->getName();?>" class="form-send" method="POST" action="<?php echo url_for('@facebooktabSave') ?>">
      <?php echo $form->renderHiddenFields() ?>
    <div class="fbcampos-left">
        <li class="label"><?php echo __('novedades_nombre') ?></li>
        <li class="campo"><?php echo $form['nombre']->render(array('tabIndex'=>1)) ?></li>
        <li class="label"><?php echo __('novedades_email') ?></li>
        <li class="campo"><?php echo $form['email']->render(array('tabIndex'=>2)) ?></li>

        <div class="div-send"><button class="send" type="submit" tabIndex="4"><?php echo __('novedades_Enviar') ?></button></div>
    </div>

                  
                  
                  
                  
                  
</form>
</div>
<div class="error_list">
	<?php foreach($form->getFormattedErrors() as $error): ?>
	<li><?php echo $error; ?></li>
	<?php endforeach; ?>
</div>
<?php 
    if($user_has_flash_ok):
      
  ?>
  <div class="ok_list">
    <?php echo __('novedades_gracias por registrarse');?>
  </div>
  <?php
    endif;
  ?>
</div>
  <div id="web">
    <?php echo __('novedades_facebook tab contacto') ?>
  </div>
<div id="compart"><div id="fb-root"></div> 

 

<!-- USE 'Asynchronous Loading' version, for IE8 to work

http://developers.facebook.com/docs/reference/javascript/FB.init/ --> 

 

<script> 

  window.fbAsyncInit = function() {

    FB.init({

      appId  : '361176557309470',

      status : true, // check login status

      cookie : true, // enable cookies to allow the server to access the session

      xfbml  : true  // parse XFBML

    });

  };

 

  (function() {

    var e = document.createElement('script');

    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';

    e.async = true;

    document.getElementById('fb-root').appendChild(e);

  }());

</script> 

 

 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script> 

 

<img id = "share_button" src = "https://www.rentnchill.com/images/compartir.png"> 

 

<script type="text/javascript"> 

$(document).ready(function(){

$('#share_button').live('click', function(e){

e.preventDefault();

FB.ui(

{

method: 'feed',

name: 'Rent n´ Chill - Alquileres en Uruguay | Aluguéis no Uruguai',

link: 'http://www.facebook.com/RentnChill/app_361176557309470',

picture: 'http://www.rentnchill.com/images/share.jpg',

caption: 'Ingresa aquí para recibir en tu email las mejores opciones de alquileres en Uruguay. | Entre aqui para receber as melhores ofertas e oportunidades de aluguéis em Uruguai.',

description: '',

message: ''

});

});

});

</script>  </div>

</div>
</div>
<?php } }?>
