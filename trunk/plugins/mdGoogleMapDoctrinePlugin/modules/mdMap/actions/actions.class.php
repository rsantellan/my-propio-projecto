<?php

/**
 * mdMap actions.
 *
 * @package    mdGoogleMapDoctrinePlugin
 * @subpackage mdMap
 * @author     Gaston Caldeiro
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdMapActions extends sfActions {

  public function preExecute() {
    
  }

  public function executeSaveCoordinates(sfWebRequest $request) {
    // Recibe:
    // object_class_name
    // object_id
    // latitude
    // longitude

    if ($this->getUser()->isAuthenticated()) {

      $objectClass = $request->getParameter('object_class_name');
      $objectId = $request->getParameter('object_id');
      $latitude = $request->getParameter('latitude');
      $longitude = $request->getParameter('longitude');

      $mdGoogleMap = mdGoogleMapManager::find($objectClass, $objectId);
      if (!$mdGoogleMap) {
        $mdGoogleMap = new mdGoogleMap();
      }
      $mdGoogleMap->setObjectClassName($objectClass);
      $mdGoogleMap->setObjectId($objectId);
      $mdGoogleMap->setLatitude($latitude);
      $mdGoogleMap->setLongitude($longitude);
      $mdGoogleMap->save();

      return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
    }
    return $this->renderText(mdBasicFunction::basic_json_response(false, array()));
  }

}