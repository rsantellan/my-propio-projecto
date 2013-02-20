<?php 
/**
* sfExtraWidgetFormRating render an rating widget
* 
* This class render a rating widget.
* 
* @author   David Zeller <zellerda01@gmail.com>
*/
class sfExtraWidgetFormRating extends sfWidgetFormInput
{
    public function configure($options = array(), $attributes = array())
    {
        $this->addOption('max', 5);
        parent::configure($options, $attributes);
    }
    
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        is_null($value) ? $value = 1 : $value = $value;
        
        $response = sfContext::getInstance()->getResponse();
        $response->addStylesheet('/sfExtraWidgetsPlugin/css/rating.css');
        $response->addJavascript('/sfExtraWidgetsPlugin/js/livepipe.js');
        $response->addJavascript('/sfExtraWidgetsPlugin/js/rating/rating.js');
        
        $ret = tag('input', array('name' => $name, 'id' => $this->generateId($name), 'value' => $value, 'type' => 'hidden'));
        $ret.= content_tag('div', '', array('id' => $this->generateId($name) . '_container', 'class' => 'rating_container'));
        $ret.= javascript_tag("var rating_eight = new Control.Rating('" . $this->generateId($name) . '_container' . "',{ input: '" . $this->generateId($name) . "', multiple: true, max: " . $this->getOption('max') . " });");
        return $ret;
    }
}
?>