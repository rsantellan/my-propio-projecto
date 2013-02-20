<?php

/**
 * mdCurrency actions.
 *
 * @package    rentNchill
 * @subpackage mdCurrency
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdCurrencyActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeChangeCurrent(sfWebRequest $request)
  {
		$code = $request->getParameter('code', null);
		$result = false;
		if($code){
			mdCurrencyHandler::setCurrencyByCode($code);
			$result = true;
		}
		
		if($request->isXmlHttpRequest())
			return mdBasicFunction::basic_json_response($result);
		else{
			$default = '@homepage';
			$referer = $this->getRequest()->getReferer(); 
		  $this->redirect($referer ? $referer : $default);
		}
  }
}
