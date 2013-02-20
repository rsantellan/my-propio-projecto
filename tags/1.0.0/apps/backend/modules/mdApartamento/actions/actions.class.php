<?php

require_once dirname(__FILE__).'/../lib/mdApartamentoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/mdApartamentoGeneratorHelper.class.php';

/**
 * mdApartamento actions.
 *
 * @package    rentNchill
 * @subpackage mdApartamento
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdApartamentoActions extends autoMdApartamentoActions
{

  public function executeGenerarIdiomas(sfWebRequest $request)
  {
    mdApartamentoHandler::generateOtherLanguages();
    return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
  }
}
