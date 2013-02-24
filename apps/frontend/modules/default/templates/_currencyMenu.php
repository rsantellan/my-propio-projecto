<li class="eur"><a class="green" href="#"><?php echo $currency->getSymbol() . ' ' . $currency->getCode() ?></a>
    <ul style="color:#000;">
        <li style="font-weight:bold;"><?php echo __('Global_Choose currency') ?>:</li>
        <?php
        $isFirst = true;
        foreach(mdCurrencyHandler::getCurrencies() as $cur): ?>
        <li>
            <?php if(!$isFirst){
            echo ' - ';
            }else{
            $isFirst = false;
            } ?>
            <a href="<?php echo url_for('@changeCurrency?code=' . $cur->getCode()); ?>" <?php if($cur == $currency) echo 'class="green"';?>><?php echo $cur->getSymbol() . ' ' . $cur->getCode() ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</li>
