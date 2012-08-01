<?php

/**
 * newsletter actions.
 *
 * @package    rentNchill
 * @subpackage newsletter
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsletterActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new newsletterForm();
    if ($request->isMethod('post')) 
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if($this->form->isValid())
      {
        $email = $this->form->getValue('email');
        $nombre = $this->form->getValue('nombre');
        $cultura = $this->getUser()->getCulture();
        $auxCultura = 1;
        switch ($cultura) {
          case "es":
              $auxCultura= 1;
            break;
          case "en":
              $auxCultura= 2;
            break;
          case "pt":
              $auxCultura= 3;
            break;          
          default:
            break;
        }
        mdNewsletterHandler::registerUser($email, $auxCultura, $nombre);
        //var_dump($email.' - '.$nombre.' - '.$cultura);
        $this->getUser()->setFlash('ok', 'guardado ok');
      }
    }
  }
  
  public function executeDesvincularse(sfWebRequest $request) 
  {
    $this->form = new mdNewsletterDeleteForm();
    if ($request->isMethod('post')) 
    {
      $parameters = $request->getParameter($this->form->getName());
      $this->form->bind($parameters);
      if($this->form->isValid())
      {
          $mdNewsLetterUser = mdNewsletterHandler::retrieveNewsLetterUserByEmail($parameters["mail"]);
          if($mdNewsLetterUser)
          {
            $mdNewsLetterUser->delete();
            $this->getUser()->setFlash('ok', 'guardado ok');
          }
      }
    }
  }
}
