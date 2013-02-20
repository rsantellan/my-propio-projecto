<?php

/*
 */

/**
 * Description of changeAvatarHandler
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class changeAvatarHandler {
  
  public static function changeAvatarToLast($class, $id)
  {
    $conn = Doctrine_Manager::getInstance()->getCurrentConnection(); 
    $q1 = "select id from md_media mm where object_class_name = ? and object_id = ?";
    $r = $conn->fetchOne($q1, array($class, $id));
    $album = Doctrine::getTable('mdMediaAlbum')->findOneBy('md_media_id', $r);
    
    $q2 = "SELECT id FROM md_media_content where id IN (SELECT md_media_content_id FROM md_media_album_content m where md_media_album_id = ?) order by created_at desc limit 1";
    $r2 = $conn->fetchOne($q2, array($album->getId()));
    $album->setMdMediaContentId($r2);
    $album->save();
    return true;
  }
}

?>
