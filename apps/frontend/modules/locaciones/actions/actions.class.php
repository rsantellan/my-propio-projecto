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
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
		$this->locaciones = Doctrine::getTable('mdLocacion')->findAll();
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
		
	}

}
