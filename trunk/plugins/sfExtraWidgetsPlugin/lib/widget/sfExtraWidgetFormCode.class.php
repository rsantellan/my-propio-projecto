<?php 
/**
* sfExtraWidgetFormInputSearch
* 
* The class render a textarea for code edit
* 
* @author   David Zeller <zellerda01@gmail.com>
*/
class sfExtraWidgetFormCode extends sfWidgetFormTextarea
{    
    public function configure($options = array(), $attributes = array())
    {
        $this->addRequiredOption('language');
        $this->addOption('autocomplete', false);
        $this->addOption('readonly', false);
        $this->addOption('linenumbers', true);
        
        parent::configure($options, $attributes);
    }
    
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $response = sfContext::getInstance()->getResponse();
        $response->addJavascript('/sfExtraWidgetsPlugin/codepress/codepress.js');
        
        $this->addClass('codepress');
        $this->addClass($this->getOption('language'));
        
        if($this->getOption('autocomplete'))
        {
            $this->addClass('autocomplete-on');
        }
        else
        {
            $this->addClass('autocomplete-off');
        }
        
        if($this->getOption('readonly'))
        {
            $this->addClass('readonly-on');
        }
        else
        {
            $this->addClass('readonly-off');
        }
        
        if($this->getOption('linenumbers'))
        {
            $this->addClass('linenumbers-on');
        }
        else
        {
            $this->addClass('linenumbers-off');
        }
        
        return parent::render($name, $value, $this->getAttributes(), $errors);
    }
    
    protected function addClass($value)
    {
        $attribute = $this->getAttribute('class');
        
        if($attribute != '')
        {
            $attribute = $attribute . ' ' . $value;
        }
        else
        {
            $attribute = $value;
        }
        
        $this->setAttribute('class', $attribute);
    }
}
?>