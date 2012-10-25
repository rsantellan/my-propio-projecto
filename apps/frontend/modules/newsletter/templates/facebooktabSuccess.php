<?php
use_stylesheet('https://www.rentnchill.com/css/facebooktab.css');
use_stylesheet('https://www.rentnchill.com/webfontkit-20111024-094554/stylesheet.css');
?>


<div id="fball" >
<div id="gris">
<div id="idioma"> 

<a href="https://www.rentnchill.com/pt/newsletter.php/">Portugués</a> | <a href="https://www.rentnchill.com/es/newsletter.php/">Español</a></div>
<div id="bienvenidos">
<?php echo __('novedades_facebook tab text') ?>    
</div>
<div id="fbcamp">
  <?php 
    if($sf_user->hasFlash('ok')):
      
  ?>
  <div>
    <?php echo __('novedades_gracias por registrarse');?>
  </div>
  <?php
    endif;
  ?>
<form name="<?php echo $form->getName();?>" class="form-send" method="POST" action="<?php echo url_for('@facebooktabSave') ?>">
      <?php echo $form->renderHiddenFields() ?>
    <div class="fbcampos-left">
      <ul>
        <li class="label"><?php echo __('novedades_nombre') ?></li>
        <li class="campo"><?php echo $form['nombre']->render(array('tabIndex'=>1)) ?></li>
        <li class="label"><?php echo __('novedades_email') ?></li>
        <li class="campo"><?php echo $form['email']->render(array('tabIndex'=>2)) ?></li>
      </ul>
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

name: 'Rent n Chill - Find a place to stay and chill',

link: 'http://www.facebook.com/RentnChill/app_361176557309470',

picture: 'http://www.rentnchill.com/images/share.jpg',

caption: 'Regístrate y recibe las mejores opciones de alquileres en Uruguay.',

description: '',

message: ''

});

});

});

</script>  </div>
</div>
</div>
</div>
