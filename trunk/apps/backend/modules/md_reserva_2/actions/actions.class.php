<?php

require_once dirname(__FILE__).'/../lib/md_reserva_2GeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/md_reserva_2GeneratorHelper.class.php';

/**
 * md_reserva_2 actions.
 *
 * @package    rentNchill
 * @subpackage md_reserva_2
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class md_reserva_2Actions extends autoMd_reserva_2Actions
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
      //$organo = $form->save();
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
