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
  
  public function executeChangeReservaStatus(sfWebRequest $request)
  {
    $this->object = Doctrine::getTable('mdReserva')->find($request->getParameter('id'));
    $this->form = new mdReservaStatusForm($this->object);
  }
  
  public function executeSaveStatus(sfWebRequest $request)
  {
    $auxForm = new mdReservaStatusForm();
    $parameters = $request->getParameter($auxForm->getName());
    $id = $parameters["id"];
    
    $object = Doctrine::getTable('mdReserva')->find($id);
    $form = new mdReservaStatusForm($object);
    $form->bind($parameters);
    if ($form->isValid())
    {
      $form->save();
      //$form = new OrganosForm($organo);
      //$body = $this->getPartial('small_form', array('form'=>$form));

      return $this->renderText(mdBasicFunction::basic_json_response(true, array('id'=>$id, 'estado'=> '')));
    }
    else
    {
      $body = $this->getPartial('_reserva_form', array('form'=>$form));
      return $this->renderText(mdBasicFunction::basic_json_response(false, array('body' => $body)));
    }
  }
}
