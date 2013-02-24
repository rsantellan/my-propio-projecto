
<footer>

    <div class="black">

        <div class="bdiv">

            <ul>

                <li><img src="/images/hand-white.png" width="14" height="13"  /></li>

                <li class="gettoknow"><?php echo __('Global_GET TO KNOW') ?>:</li>

            </ul>

        </div>

        <div class="bdiv">

            <?php include_component("locaciones", "footer", array( 'sf_cache_key' => 'locaciones_cultura_'.$sf_user->getCulture()));?>

        </div>  <div class="beba"><a href="http://www.bebapaezvilaro.com/" target="_blank"><img src="/images/logobeba.jpg" width="99" height="80" border="0" /></a></div>      

    </div>

    <div class="line">

    </div>

    <div class="footer-left">

       

            <a href="<?php echo url_for('@about') ?>"><?php echo __('Global_About us') ?></a>

            <img width="1" height="21" src="/images/separator.png">

            <a href="<?php echo url_for('@terminos') ?>"><?php echo __('Global_Terms of Service') ?></a>
<!--
            <img width="1" height="21" src="/images/separator.png">
            
            <a href="#"><?php echo __('Global_Sitemap') ?></a>
-->
            <img width="1" height="21" src="/images/separator.png">

            <a href="<?php echo url_for("@newsletter");?>"><?php echo __('Global_Newsleetter') ?></a>


    </div>
    <div class="medio">

            <?php echo __('Global_Footer contact') ?>

        </div>

    <div class="footer-right">

    <div class="serv">    

           <img src="/images/candle.png" width="12" height="14" />

            <?php echo __('Global_Safe server site') ?>

</div>
        <div class="met">

            <?php echo __('Global_Footer Payment Methods') ?>:

            <img src="/images/payment-methods.png" width="143" height="18" /></li>

        </div>

    </div>

</footer>
