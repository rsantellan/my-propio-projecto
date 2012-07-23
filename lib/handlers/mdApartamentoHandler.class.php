<?php

/*
 */

/**
 * Description of mdApartamentoHandler
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class mdApartamentoHandler {
  
  
  public static function generateOtherLanguages()
  {
    $apartamentos = Doctrine::getTable('mdApartamento')->findAll();
    foreach($apartamentos as $apto)
    {
      self::saveOtherLanguages($apto->getId());
    }
  }
  
  public static function saveOtherLanguages($mdApartamentoId)
  {
    $app = sfContext::getInstance ()->getConfiguration()->getApplication();
    $i18n_dir = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . 'apps' . DIRECTORY_SEPARATOR . $app . DIRECTORY_SEPARATOR . 'config';
    $xml = simplexml_load_file($i18n_dir . "/lenguages.xml");

    $lenguageList = array();
    foreach ($xml->children() as $child) {
        $lenguageList[$child->getName()] = $child->getName();
    }
    $hay = array();
    $noHay = array();
    $cantidad = Doctrine::getTable("mdApartamento")->countNumberOfTranslation($mdApartamentoId);
    $idiomasEnBase = array();
    foreach($cantidad as $auxLang)
    {
      $idiomasEnBase[$auxLang['lang']] = $auxLang['lang'];
    }
    
    foreach($lenguageList as $lang)
    {
      if(!isset($idiomasEnBase[$lang]))
      {
        $noHay[] = $lang; 
      }
    }
    if(count($cantidad) == 0)
    {
      throw new Exception('Hubo un error al guardar el multidioma del apartamento', 540);
    }
    $idioma = array_pop($cantidad);
    foreach($noHay as $lang)
    {
      Doctrine::getTable("mdApartamento")->insertOtherLanguage($idioma["id"], $idioma["titulo"], $idioma["copete"], $idioma["descripcion"], $lang);
    }
  }
}


