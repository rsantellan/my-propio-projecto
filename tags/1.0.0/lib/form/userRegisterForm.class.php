<?php
class userRegisterForm extends sfForm
{
  
  public function configure()
  {
    $this->setWidgets(array(
        'nombre'      => new sfWidgetFormInput(),
        'apellido'    => new sfWidgetFormInput(),
        'password'    => new sfWidgetFormInputPassword(),
        'email'                 => new sfWidgetFormInput()
    ));

    $error_message = array(
            'required'=>'Requerido.',
            'invalid' => 'Email invalido o duplicado.'
            );

    $this->setValidators(array(
        'nombre'      => new sfValidatorString(array('required' => true),$error_message),
        'apellido'    => new sfValidatorString(array('required' => true),$error_message),
        'password'    => new sfValidatorString(array('required' => true),$error_message),
        'email'       => new sfValidatorAnd(
                                      array(
                                            new sfValidatorEmail(),
                                            new mdValidatorEmail()
                                        ), array('required' => true), $error_message)
    ));    
    
   // $this->widgetSchema->moveField ( 'password_confirmation', 'after', 'password' );
		
    //$this->mergePostValidator ( new sfValidatorSchemaCompare ( 'password', sfValidatorSchemaCompare::EQUAL, 'password_confirmation', array (), array ('invalid' => 'The two passwords must be the same.' ) ) );
    
    //$this->widgetSchema->moveField ( 'email_confirmation', 'after', 'email' );
		
    //$this->mergePostValidator ( new sfValidatorSchemaCompare ( 'email', sfValidatorSchemaCompare::EQUAL, 'email_confirmation', array (), array ('invalid' => 'The two passwords must be the same.' ) ) );
    
    $this->widgetSchema->setNameFormat('register[%s]');
  }
  
  public function save($conn = null)
  {
    $tainted = $this->getTaintedValues();
    $infoEmail = explode('@', $tainted['email']);
    $auxUser = Doctrine::getTable('mdUser')->findOneByEmail($tainted['email']);
    $mdUser = new mdUser();
    if($auxUser)
    {
      $mdUser = $auxUser;
    }
    else
    {
      $mdUser->setEmail($tainted['email']);
      $mdUser->save();
    }
    
    
    $mdPassport = new mdPassport();
    $mdPassport->setMdUserId($mdUser->getId());
    $mdPassport->setPassword($tainted['password']);
    $mdPassport->setUsername($infoEmail[0]);
    $mdPassport->setAccountActive('1');
    $mdPassport->save();
    
    $mdUserProfile = new mdUserProfile();
    $mdUserProfile->setMdUserIdTmp($mdUser->getId());
    $mdUserProfile->setName($tainted['nombre']);
    $mdUserProfile->setLastName($tainted['apellido']);
    $mdUserProfile->setCountryCode('UY');
    $mdUserProfile->save();
    
    return $mdPassport;
  }
  
}
