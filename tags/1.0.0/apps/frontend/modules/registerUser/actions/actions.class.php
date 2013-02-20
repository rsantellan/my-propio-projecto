<?php

/**
 * registerUser actions.
 *
 * @package    macroelectric
 * @subpackage default
 * @author     Gaston Caldeiro
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerUserActions extends sfActions
{
  
	public function executeIndex($request){
		$this->loginForm = new mdPassportLoginForm ( );
	}

  public function executeProcessNewUser(sfWebRequest $request)
  {
      try
      {
        sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
        
        $form = new userRegisterForm();

        if($request->isMethod('post'))
        {
          $params = $request->getParameter('register');

          $form->bind($params);

          if ($form->isValid())
          {
            $mdPassport = $form->save();
            
            $this->getUser()->signIn($mdPassport);
            $this->getUser()->setAuthenticated(true);
            $this->getUser()->addCredential('user');
            
            return $this->renderText(mdBasicFunction::basic_json_response(true, array('md_user_id'=>$mdPassport->getMdUserId(), 'body'=>$this->getPartial('registerUser/userInfo'))));
          }
          else
          {
            $partial = $this->getPartial('registerUser/registerUser', array('form' => $form));

            return $this->renderText(mdBasicFunction::basic_json_response(false, array('form' => $partial)));
          }
        }          
      }
      catch(Exception $e)
      {
        return $this->renderText(mdBasicFunction::basic_json_response(false, array('error' => $e->getMessage() . __('Mensajes_Error'))));
      }    
  }
 

}
