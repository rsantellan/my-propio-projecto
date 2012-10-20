<?php
use_stylesheet('https://www.rentnchill.com/css/facebooktab.css');
use_stylesheet('https://www.rentnchill.com/webfontkit-20111024-094554/stylesheet.css');
?>


<div id="fball" >
<div id="gris">
<div id="idioma"> 

<a href="https://www.rentnchill.com/pt/newsletter.html">Portugués</a> | <a href="https://www.rentnchill.com/es/newsletter.html">Español</a></div>
<div id="bienvenidos">
<?php echo __('novedades_facebook tab text') ?>    
</div>
<div id="fbcamp">
<form name="<?php echo $form->getName();?>" class="form-send" method="POST" action="<?php echo url_for('@facebooktab') ?>">
      <?php echo $form->renderHiddenFields() ?>
    <div class="fbcampos-left">
        <li class="label"><?php echo __('novedades_nombre') ?></li>
        <li class="campo"><?php echo $form['nombre']->render(array('tabIndex'=>1)) ?></li>
        <li class="label"><?php echo __('novedades_email') ?></li>
        <li class="campo"><?php echo $form['email']->render(array('tabIndex'=>2)) ?></li>

        <div class="div-send"><button class="send" type="submit" tabIndex="4"><?php echo __('novedades_Enviar') ?></button></div>
    </div>

                  <div class="clear"></div>
                  <ul class="error_list">
                      <?php foreach($form->getFormattedErrors() as $error): ?>
                      <li><?php echo $error; ?></li>
                      <?php endforeach; ?>
                  </ul>
                  <div class="clear"></div>
</form>
</div><div id="web">Visitanos en <a href="http://www.rentnchill.com" target="_blank">www.rentnchill.com</a> | Seguinos en <a href="https://twitter.com/RentnChill" target="_blank"><img src="http://www.rentnchill.com/images/tw.jpg" width="26" height="27" border="0" /></a></div>
<div id="compart"><script> 
  window.fbAsyncInit = function() {
    FB.init({
      appId  : '347027205374277',
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
name: 'Rent n Chill - Find a place to stay and chill ',
link: 'http://www.facebook.com/SEMM.Emergencia/app_347027205374277',
picture: 'http://www.semm.com.uy/fb/promociones/images/promo.jpg',
caption: 'Registrate y recibí las mejores ofertas y oportunidades.. ',
description: '',
message: ''
});
});
});
</script> </div>
</div>
</div>
</div>
