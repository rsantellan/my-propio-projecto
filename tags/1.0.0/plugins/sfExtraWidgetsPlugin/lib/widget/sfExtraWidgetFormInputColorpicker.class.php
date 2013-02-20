<?php 
/**
* sfExtraWidgetFormInputColorpicker render a colorpicker widget.
* 
* This class render a simple input widget with an icon at the end.
* When you click on the icon an color picker will be show to help
* the color selection.
* 
* Warning : This class use Prototype to generate the calendar,
* make sure that the prototype plugin is loaded.
* 
* @author   David Zeller <zellerda01@gmail.com>
*/
class sfExtraWidgetFormInputColorpicker extends sfWidgetFormInput
{
    public function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);
    }
    
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $response = sfContext::getInstance()->getResponse();
        $response->addJavascript('/sfExtraWidgetsPlugin/js/colorpicker.js');
        
        return parent::render($name, $value, $attributes, $errors) . javascript_tag("ProColor.prototype.attachButton('" . $this->generateId($name) . "', { imgPath:'/sfExtraWidgetsPlugin/img/colorpicker/procolor_win_', showInField: true });");
    }
}
?>