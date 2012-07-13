<?php
class mdGoogleMapManager
{
    public static function find($objectClass, $objectId)
    {
        $mdGoogleMaps = Doctrine::getTable('mdGoogleMap')->findByMultiples(array('object_class_name', 'object_id'), array($objectClass, $objectId));
        if($mdGoogleMaps)
            return $mdGoogleMaps->getFirst();
        return false;
    }
}