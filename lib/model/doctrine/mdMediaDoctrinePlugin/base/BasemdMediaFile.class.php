<?php

/**
 * BasemdMediaFile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $filename
 * @property string $filetype
 * @property string $description
 * @property string $path
 * 
 * @method integer     getId()          Returns the current record's "id" value
 * @method string      getName()        Returns the current record's "name" value
 * @method string      getFilename()    Returns the current record's "filename" value
 * @method string      getFiletype()    Returns the current record's "filetype" value
 * @method string      getDescription() Returns the current record's "description" value
 * @method string      getPath()        Returns the current record's "path" value
 * @method mdMediaFile setId()          Sets the current record's "id" value
 * @method mdMediaFile setName()        Sets the current record's "name" value
 * @method mdMediaFile setFilename()    Sets the current record's "filename" value
 * @method mdMediaFile setFiletype()    Sets the current record's "filetype" value
 * @method mdMediaFile setDescription() Sets the current record's "description" value
 * @method mdMediaFile setPath()        Sets the current record's "path" value
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdMediaFile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_media_file');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 64,
             ));
        $this->hasColumn('filename', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 64,
             ));
        $this->hasColumn('filetype', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 64,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('path', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $mdmediacontentbehavior0 = new mdMediaContentBehavior();
        $this->actAs($mdmediacontentbehavior0);
    }
}