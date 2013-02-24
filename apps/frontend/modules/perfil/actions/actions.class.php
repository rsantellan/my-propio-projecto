<?php

/**
 * perfil actions.
 *
 * @package    rentNchill
 * @subpackage perfil
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class perfilActions extends sfActions
{
    
   private $metaDebug = false;
    
    public function postExecute() {
        parent::postExecute();
        if(!$this->getRequest()->isXmlHttpRequest())
        {
          mdMetaTagsHandler::addGenericMetas($this, null, array('debug'=>$this->metaDebug));
        }
    }
       
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
        $this->mdUser = $this->getRoute()->getObject();
	
	$params = array();
	$params["[nombre]"] = $this->mdUser->getMdUserProfile()->getFullName();
        mdMetaTagsHandler::addMetas($this,'Ver o Editar Usuario', array('params'=>$params, 'debug'=>$this->metaDebug));
    	
	
	$this->deptos = Doctrine::getTable('mdApartamento')->findBymd_user_id($this->mdUser->getId());
	
	$this->reservados = Doctrine::getTable('mdApartamento')->findReservedBy($this->mdUser->getId());
	$this->visitados = Doctrine::getTable('mdApartamento')->findVisitedBy($this->mdUser->getId());
  }
  
  public function executeRetrieveUserAvatar(sfWebRequest $request)
  {
	  $mdUserProfile = mdUserHandler::retrieveMdUserProfile($request->getParameter('id'));
	  if(!$mdUserProfile)
	  {
		return $this->renderText(mdBasicFunction::basic_json_response(false, array()));
	  }
      changeAvatarHandler::changeAvatarToLast('mdUserProfile', $request->getParameter('id'));
	  $src = $mdUserProfile->retrieveAvatar(array(mdWebOptions::WIDTH =>180 , mdWebOptions::HEIGHT =>180 , mdWebOptions::CODE => mdWebCodes::CROPRESIZE ));
	  return $this->renderText(mdBasicFunction::basic_json_response(true, array('src' => $src)));
  }
}
