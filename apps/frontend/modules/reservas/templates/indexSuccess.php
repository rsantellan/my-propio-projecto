<?php
use_stylesheet('bookit.css');

use_stylesheet('../fancybox/jquery.fancybox-1.3.4.css');
use_javascript('../fancybox/jquery.fancybox-1.3.4.pack.js');

use_javascript('regiterUser.js');
use_javascript('jquery.scrollTo-min.js');
?>

<div class="title">
  <li><img src="/images/folder.png" width="15" height="12" /></li>
  <li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
  <li>/</li>
  <li class="current"><?php echo __('Reservas_navegacion') ?></li>
</div> 
<?php echo include_component('locaciones', 'title_right'); ?>
<div class="main-content-up">
  <div class="col-left">
    <div class="tourist">
      <div class="info-tourist"><?php echo __('Reservas_titulo') ?></div>
      <div class="info-bookit">
        <ul>
          <li><?php echo __('Reservas_title') ?>:<span> <?php echo $depto->getTitulo() ?></span></li>
          <li><?php echo __('Reservas_description') ?>:<span> <?php echo $depto->getCopete() ?></span></li>
          <li><?php echo __('Reservas_city') ?>:<span> <?php echo $depto->getmdLocacion()->getNombre() ?></span></li>
          <li><?php echo __('Reservas_guests') ?>:<span> <?php echo $values['cantidad_personas'] ?></span></li>
          <li><?php echo __('Reservas_nights') ?>:<span> <?php echo $noches ?></span></li>
        </ul>
        <ul>
          <li><?php echo __('Reservas_porcentaje a pagar ahora') ?></li>
          <li class="prezio green">
            <?php echo mdCurrencyHandler::getCurrentCode() ?> 
            <?php 
            $auxValor = 0;
            if($values["md_currency_id"] !=  mdCurrencyHandler::getCurrent()->getId()):
                //No son iguales, tengo que recalcular.
              $auxValor = mdApartamento::calculatePriceOfConversion($values['total'], mdCurrencyHandler::getCurrent(), $values["md_currency_id"]);
            else:
              //No tengo que hacer nada
              $auxValor = $values['total'];
            endif;
            echo round($auxValor * 0.125, 0);
            ?>
            <?php  ?>
          </li>
          <li><?php echo __('Reservas_total') ?></li>
          <li class="prezio green">
            <?php echo mdCurrencyHandler::getCurrentCode() ?> 
            <?php 
            if($values["md_currency_id"] !=  mdCurrencyHandler::getCurrent()->getId()):
                //No son iguales, tengo que recalcular.
              echo mdApartamento::calculatePriceOfConversion($values['total'], mdCurrencyHandler::getCurrent(), $values["md_currency_id"]);
            else:
              //No tengo que hacer nada
              echo $values['total'];
            endif;
            ?>
            <?php  ?>
          </li>
        </ul>
      </div>
      <div class="line2"></div>
      <div class="send-log">
        <?php if ($sf_user->isAuthenticated()): ?>
          <?php include_partial('registerUser/userInfo') ?>
        <?php else: ?>
          <div id="register_new_user_div" >
            <?php include_component('registerUser', 'registerUser'); ?>
          </div>
        <?php endif; ?>
        <div class="div-send">
          <li style="font-size:36px; font-family: 'BelloScript'; display:list-item;"><?php echo __('Reservas_Payment title') ?></li>
          <li style="font-family: 'CourierRegular'; font-size:11px; display:list-item;">
              <?php echo __('Reservas_Terminos y condiciones') ?>
<!--              By clicking on "Book it" you confirm <br /> that you accept the <a href="http://rentnchill.com/terms_and_conditions.html" class="green">Terms of Service.</a>-->
          </li>
          <div class="clear"></div>
          <li><img src="/images/paypal.png" width="93" height="27" /></li>
          <button type="button" id="submit" class="send" style="margin-top:20px;"><?php echo __('Reservas_Bookit') ?></button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function(){
      $('#submit').click(function(){
        if($('#user_new_form').length>0){
          registerNewUser($('#user_new_form'));
          return false;
        }
        $(this).remove();
        window.location.href = '<?php echo url_for('reservas/pay') ?>'
      })
    })
  </script>
