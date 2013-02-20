<?php 
/**
* sfExtraWidgetFormSelectCurrency render an select currency widget
* 
* @author   David Zeller <zellerda01@gmail.com>
*/
class sfExtraWidgetFormSelectCurrency extends sfWidgetFormI18nSelectCurrency
{
    protected function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);

        $this->addOption('currencies');
        $this->addOption('culture', sfContext::getInstance()->getUser()->getCulture());
        $this->addOption('add_empty', false);
        
        $culture = $this->getOption('culture');
        
        $currencies = sfCultureInfo::getInstance($culture)->getCurrencies(isset($options['currencies']) ? $options['currencies'] : null);

        $a_currencies = array();
        
        foreach($currencies as $code => $name)
        {
            $a_currencies[$code] = strtoupper($code) . ' - ' . ucfirst($name);
        }
        
        asort($a_currencies);

        $addEmpty = isset($options['add_empty']) ? $options['add_empty'] : false;
        
        if (false !== $addEmpty)
        {
            $a_currencies = array_merge(array('' => true === $addEmpty ? '' : $addEmpty), $a_currencies);
        }

        $this->setOption('choices', $a_currencies);
    }
}
?>