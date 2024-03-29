<?php

/**
 * locaciones actions.
 *
 * @package    rentNchill
 * @subpackage locaciones
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class locacionesActions extends sfActions
{
    
    private $metaDebug = false;
    
    
    public function postExecute() {
        parent::postExecute();
        mdMetaTagsHandler::addGenericMetas($this, null, array('debug'=>$this->metaDebug));
    }
    
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->locaciones = Doctrine::getTable('mdLocacion')->findAll();

    $params = array();
    mdMetaTagsHandler::addMetas($this,'Locaciones', array('params'=>$params, 'debug'=>$this->metaDebug));
  }

	/**
	 * detalle 
	 *
	 * @return void
	 * @author maui .-
	 **/
	public function executeDetalle(sfWebRequest $request)
	{
		$this->locacion = $this->getRoute()->getObject();
	    $params = array();
        $params['[locacion]'] = $this->locacion->getNombre();
        sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
        $params['[country]'] = format_country($this->locacion->getCountry());
	    mdMetaTagsHandler::addMetas($this,'Locacion', array('params'=>$params, 'debug'=>$this->metaDebug));
	}

}
