<?php

/**
 * BasemdLocacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $country
 * @property string $nombre
 * @property string $descripcion
 * @property Doctrine_Collection $mdApartamento
 * @property Doctrine_Collection $mdLocacionTemporada
 * @property Doctrine_Collection $temporadaAnual
 * 
 * @method integer             getId()                  Returns the current record's "id" value
 * @method string              getCountry()             Returns the current record's "country" value
 * @method string              getNombre()              Returns the current record's "nombre" value
 * @method string              getDescripcion()         Returns the current record's "descripcion" value
 * @method Doctrine_Collection getMdApartamento()       Returns the current record's "mdApartamento" collection
 * @method Doctrine_Collection getMdLocacionTemporada() Returns the current record's "mdLocacionTemporada" collection
 * @method Doctrine_Collection getTemporadaAnual()      Returns the current record's "temporadaAnual" collection
 * @method mdLocacion          setId()                  Sets the current record's "id" value
 * @method mdLocacion          setCountry()             Sets the current record's "country" value
 * @method mdLocacion          setNombre()              Sets the current record's "nombre" value
 * @method mdLocacion          setDescripcion()         Sets the current record's "descripcion" value
 * @method mdLocacion          setMdApartamento()       Sets the current record's "mdApartamento" collection
 * @method mdLocacion          setMdLocacionTemporada() Sets the current record's "mdLocacionTemporada" collection
 * @method mdLocacion          setTemporadaAnual()      Sets the current record's "temporadaAnual" collection
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdLocacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_locacion');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('country', 'string', 2, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 2,
             ));
        $this->hasColumn('nombre', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('descripcion', 'string', 5000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 5000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('mdApartamento', array(
             'local' => 'id',
             'foreign' => 'md_locacion_id'));

        $this->hasMany('mdLocacionTemporada', array(
             'local' => 'id',
             'foreign' => 'md_locacion_id'));

        $this->hasMany('temporadaAnual', array(
             'local' => 'id',
             'foreign' => 'md_locacion_id'));

        $mdmediabehavior0 = new mdMediaBehavior();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'nombre',
              1 => 'descripcion',
             ),
             ));
        $this->actAs($mdmediabehavior0);
        $this->actAs($i18n0);
    }
}