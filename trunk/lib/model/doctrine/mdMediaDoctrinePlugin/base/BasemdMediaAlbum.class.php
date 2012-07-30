<?php

/**
 * BasemdMediaAlbum
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $md_media_id
 * @property string $title
 * @property string $description
 * @property enum $type
 * @property bool $deleteAllowed
 * @property integer $md_media_content_id
 * @property mdMediaContent $mdMediaContent
 * @property mdMedia $mdMedia
 * @property Doctrine_Collection $mdMediaAlbumContent
 * 
 * @method integer             getId()                  Returns the current record's "id" value
 * @method integer             getMdMediaId()           Returns the current record's "md_media_id" value
 * @method string              getTitle()               Returns the current record's "title" value
 * @method string              getDescription()         Returns the current record's "description" value
 * @method enum                getType()                Returns the current record's "type" value
 * @method bool                getDeleteAllowed()       Returns the current record's "deleteAllowed" value
 * @method integer             getMdMediaContentId()    Returns the current record's "md_media_content_id" value
 * @method mdMediaContent      getMdMediaContent()      Returns the current record's "mdMediaContent" value
 * @method mdMedia             getMdMedia()             Returns the current record's "mdMedia" value
 * @method Doctrine_Collection getMdMediaAlbumContent() Returns the current record's "mdMediaAlbumContent" collection
 * @method mdMediaAlbum        setId()                  Sets the current record's "id" value
 * @method mdMediaAlbum        setMdMediaId()           Sets the current record's "md_media_id" value
 * @method mdMediaAlbum        setTitle()               Sets the current record's "title" value
 * @method mdMediaAlbum        setDescription()         Sets the current record's "description" value
 * @method mdMediaAlbum        setType()                Sets the current record's "type" value
 * @method mdMediaAlbum        setDeleteAllowed()       Sets the current record's "deleteAllowed" value
 * @method mdMediaAlbum        setMdMediaContentId()    Sets the current record's "md_media_content_id" value
 * @method mdMediaAlbum        setMdMediaContent()      Sets the current record's "mdMediaContent" value
 * @method mdMediaAlbum        setMdMedia()             Sets the current record's "mdMedia" value
 * @method mdMediaAlbum        setMdMediaAlbumContent() Sets the current record's "mdMediaAlbumContent" collection
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdMediaAlbum extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_media_album');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('md_media_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 64,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Image',
              1 => 'Video',
              2 => 'File',
              3 => 'Mixed',
             ),
             'default' => 'Mixed',
             ));
        $this->hasColumn('deleteAllowed', 'bool', null, array(
             'type' => 'bool',
             'notnull' => true,
             ));
        $this->hasColumn('md_media_content_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));


        $this->index('md_media_album_title_index', array(
             'fields' => 
             array(
              0 => 'md_media_id',
              1 => 'title',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('mdMediaContent', array(
             'local' => 'md_media_content_id',
             'foreign' => 'id'));

        $this->hasOne('mdMedia', array(
             'local' => 'md_media_id',
             'foreign' => 'id'));

        $this->hasMany('mdMediaAlbumContent', array(
             'local' => 'id',
             'foreign' => 'md_media_album_id'));
    }
}