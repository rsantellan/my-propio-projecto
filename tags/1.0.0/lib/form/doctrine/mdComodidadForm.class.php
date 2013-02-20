<?php

/**
 * mdComodidad form.
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdComodidadForm extends BasemdComodidadForm
{
  public function configure()
  {
    if(sfContext::hasInstance()){
        $culture = sfContext::getInstance()->getUser()->getCulture();
    }else{
        $culture = 'es';
    }
    $this->embedI18n(array($culture));
    unset($this['imagen'], $this['md_apartamento_list']);
  }
}
