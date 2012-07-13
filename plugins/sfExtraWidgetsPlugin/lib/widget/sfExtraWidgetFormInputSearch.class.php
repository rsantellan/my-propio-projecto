<?php 
/**
* sfExtraWidgetFormInputSearch render an ajax search field
* 
* This class render a simple input widget, but when you type any
* characters a proposition list will appear below the input widget.
* 
* @author   David Zeller <zellerda01@gmail.com>
*/
class sfExtraWidgetFormInputSearch extends sfWidgetFormInput
{    
    public function configure($options = array(), $attributes = array())
    {
        $this->addRequiredOption('url');
        $this->addOption('param', 'autocomplete');
        $this->addOption('min_chars', 2);
        $this->addOption('obj', null);
        $this->addOption('print', '');
        
        parent::configure($options, $attributes);
    }
    
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $response = sfContext::getInstance()->getResponse();
        $response->addStylesheet('/sfExtraWidgetsPlugin/css/autocompleter.css');

        if($this->getOption('obj') && $value)
        {
            try
            {
                $this->getOption('obj')->setId($value);
                $this->getOption('obj')->setNew(false);
                $this->getOption('obj')->reload();
                $this->setOption('print', $this->getOption('obj')->__toString()); 
            }
            catch(Doctrine_Record_Exception $ex)
            {
                // Doctrine Fix    
                $q = Doctrine::getTable($this->getOption('obj')->getTable()->getOption('name'))->createQuery('u');
                $this->setOption('print', $q->execute()->getFirst());
            }
        }
        
        $widgetInput = $this->renderTag('input', array_merge(array('type' => 'text', 'name' => $this->generateId($name . '_search'), 'id' => $this->generateId($name . '_search'), 'value' => $this->getOption('print')), $attributes));
        $widgetInputHidden = new sfWidgetFormInputHidden(array(), $this->getAttributes());
        
        $autocompleteDiv = content_tag('div' , '', array('id' => $this->generateId($name) . '_autocomplete', 'class' => 'autocomplete'));
        
        $autocompleteJs = javascript_tag("
            function ac_update_" . $this->generateId($name) . "(text, li)
            {
                $('" . $this->generateId($name) . "').value = li.id;
                
                if(li.id == '')
                {
                    $('" . $this->generateId($name) . "_search').value = '';
                }
            }
            
            new Ajax.Autocompleter(
                '" . $this->generateId($name . '_search') . "',
                '" . $this->generateId($name) . '_autocomplete' . "',
                '" . url_for($this->getOption('url')) . "',
                {
                    paramName: '" . $this->getOption('param') . "',
                    indicator: 'indicator-" . $this->generateId($name) . "',
                    minChars: " . $this->getOption('min_chars') . ",
                    afterUpdateElement: ac_update_" . $this->generateId($name) . "
                });"
            );
        
        return $widgetInputHidden->render($name, $value, $attributes, $errors) . $widgetInput . 
        '<span id="indicator-' . $this->generateId($name) . '" style="display: none;">&nbsp;&nbsp;<img src="/sfExtraWidgetsPlugin/img/ajax-loader.gif" align="absmiddle" alt="Loading" /></span>' . 
        $autocompleteDiv . 
        $autocompleteJs;
    }
}
?>