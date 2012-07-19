<?php

/**
 * BasemdGoogleMap
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $object_class_name
 * @property int $object_id
 * @property decimal $latitude
 * @property decimal $longitude
 * 
 * @method integer     getId()                Returns the current record's "id" value
 * @method string      getObjectClassName()   Returns the current record's "object_class_name" value
 * @method int         getObjectId()          Returns the current record's "object_id" value
 * @method decimal     getLatitude()          Returns the current record's "latitude" value
 * @method decimal     getLongitude()         Returns the current record's "longitude" value
 * @method mdGoogleMap setId()                Sets the current record's "id" value
 * @method mdGoogleMap setObjectClassName()   Sets the current record's "object_class_name" value
 * @method mdGoogleMap setObjectId()          Sets the current record's "object_id" value
 * @method mdGoogleMap setLatitude()          Sets the current record's "latitude" value
 * @method mdGoogleMap setLongitude()         Sets the current record's "longitude" value
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdGoogleMap extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_google_map');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('object_class_name', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('object_id', 'int', 4, array(
             'type' => 'int',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('latitude', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 4,
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('longitude', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 4,
             'notnull' => true,
             'default' => 0,
             ));


        $this->index('object_identifier_index', array(
             'fields' => 
             array(
              0 => 'object_class_name',
              1 => 'object_id',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}