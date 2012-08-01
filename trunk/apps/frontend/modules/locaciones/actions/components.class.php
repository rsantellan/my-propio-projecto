<?php

class locacionesComponents extends sfComponents {

  public function executeImagen(sfWebRequest $request) {

    $q = Doctrine::getTable('mdMediaAlbumContent')->createQuery('mac')
            ->innerJoin('mac.mdMediaAlbum ma')
            ->innerJoin('ma.mdMedia m')
            ->where('m.object_class_name=?', 'mdLocacion')
            ->andWhere('ma.title=?', 'promos')
            ->orderBy('RAND()');

    $results = $q->execute();
    if ($results->count() > 0) {
      $this->imagen = array();
      $this->locacion = array();
      foreach ($results as $albumContent) {
        $content = $albumContent->getMdMediaContent();
        $this->imagen[] = $content->retrieveObject();
        $this->locacion[] = $albumContent->getMdMediaAlbum()->getMdMedia()->retrieveObject();
      }
    }
  }

  public function executePropiedades(sfWebRequest $request) {

    $this->propiedades = $this->locacion->getApartamentos(array('limit' => 10, 'order' => 'RAND()'));
  }

  public function executeTitle_right(sfWebRequest $request) {
    if (!isset($this->mdLocacion)) {
      if (isset($this->mdLocacionId) and $this->mdLocacionId) {
        $this->mdLocacion = Doctrine::getTable('mdLocacion')->find($this->mdLocacionId);
      }
    }
  }
  
  public function executeFooter(sfWebRequest $request)
  {
    $this->locaciones = Doctrine::getTable('mdLocacion')->findAll();
  }

}