<?php

require_once dirname(__FILE__).'/../lib/md_reservaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/md_reservaGeneratorHelper.class.php';

/**
 * md_reserva actions.
 *
 * @package    rentNchill
 * @subpackage md_reserva
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class md_reservaActions extends autoMd_reservaActions
{
  
  public function executeGetUserData(sfWebRequest $request)
  {
    $this->object = mdUserHandler::retrieveMdUser($request->getParameter('id'));
  }
  
  public function executeGetApartamentData(sfWebRequest $request)
  {
    $this->object = Doctrine::getTable('mdApartamento')->find($request->getParameter('id'));
  }
}
