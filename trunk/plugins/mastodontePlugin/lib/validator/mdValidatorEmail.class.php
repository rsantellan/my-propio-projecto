<?php

class mdValidatorEmail extends sfValidatorBase
{

    protected function configure($options = array(), $messages = array())
    {
        $this->addOption('duplicated');

        $this->addMessage('duplicated', 'email exist');
    }

    /**
    * @see sfValidatorBase
    */
    protected function doClean($value)
    {
      //$response = Doctrine::getTable('mdUser')->findByEmail($value);
      $aux = Doctrine::getTable('mdUser')->userHasPassport($value);
      //var_dump($aux);
      if ($aux > 0)
      {
          throw new sfValidatorError($this, 'duplicated', array('value' => $value));
      }

      return true;
    }
}