<?php

/**
 * BasemdComodidad
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $imagen
 * @property string $nombre
 * @property Doctrine_Collection $mdApartamento
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getImagen()        Returns the current record's "imagen" value
 * @method string              getNombre()        Returns the current record's "nombre" value
 * @method Doctrine_Collection getMdApartamento() Returns the current record's "mdApartamento" collection
 * @method mdComodidad         setId()            Sets the current record's "id" value
 * @method mdComodidad         setImagen()        Sets the current record's "imagen" value
 * @method mdComodidad         setNombre()        Sets the current record's "nombre" value
 * @method mdComodidad         setMdApartamento() Sets the current record's "mdApartamento" collection
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdComodidad extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_comodidad');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('imagen', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('nombre', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('mdApartamento', array(
             'refClass' => 'mdApartamento_mdComodidad',
             'local' => 'md_comodidad_id',
             'foreign' => 'md_apartamento_id'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'nombre',
             ),
             ));
        $this->actAs($i18n0);
    }
}