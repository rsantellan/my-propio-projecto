<?php

/**
 * @author     Alexandru Emil Lupu <gang.alecs@gmail.com>
 */
class sfI18nFormExtract extends sfI18nExtract
{
  protected $extractObjects = array();
  protected $messages = array();
  protected $form = null;


  public function setForm($form)
  {
    $form = str_replace('.class.php','',$form);
    if ('Form' != substr($form,-4,4))
    {
      $form .='Form';
    }
    if (class_exists($form))
    {
      $class = new ReflectionClass($form);
      if (!$class->isAbstract())
        $this->form = new $form();
      else
        $this->form = null;
    }
  }

  public function extract()
  {
    if (!is_null($this->form))
    {
      $this->registerErrorMessages();
      $this->processLabels();
      $this->processValues();
      $this->processHelp();
      $this->updateMessages($this->getFormMessages());
    }
  }

  private function getFormMessages(){
    return $this->messages;
  }

  private function registerErrorMessages(){
    $field_list = $this->form->getValidatorSchema()->getFields();
    foreach ($field_list as $field ){
      $this->merge($field);
    }
    $this->merge($this->form->getValidatorSchema()->getPostValidator());
    $this->merge($this->form->getValidatorSchema()->getPreValidator());
  }


  private function merge($field){
    if (method_exists($field,'getMessages') && method_exists($field,'getValidators')){
      $this->messages = array_merge($this->messages, $field->getMessages());
      foreach ($field->getValidators() as $f) {
        $this->merge($f);
      }
    }elseif (method_exists($field,'getMessages')){
      $this->messages = array_merge($this->messages, $field->getMessages());
    }
    $this->processMessages();
  }

  private function processMessages(){
    $msg = array();
    foreach ($this->messages as $key=>$value) {
      $msg[md5($value)] = $value;
    }
    $this->messages = $msg;
  }

  private function processLabels(){
    $labels = $this->form->getWidgetSchema()->getLabels();
    foreach ($labels as $key=>$value){
      if (empty($value))
      $this->messages[] = $this->form->getWidgetSchema()->getFormFormatter()->generateLabelName($key);
      else
      $this->messages[] = $value;
    }
    $this->processMessages();
  }
  
  private function processValues() {
    $widgetSchema = $this->form->getWidgetSchema()->getFields();
    foreach ($widgetSchema as $name => $widget) {
      if ($widget instanceof sfWidgetFormChoiceBase) {
        foreach ($widget->getChoices() as $key => $value) {
          $this->messages[] = $value;
        }
      }
    }
    $this->processMessages();
  }
  
  private function processHelp() {
    $helps = $this->form->getWidgetSchema()->getHelps();
    foreach ($helps as $key=>$value){
      if (empty($value))
      $this->messages[] = $key;
      else
      $this->messages[] = $value;
    }
    $this->processMessages();
  }
}