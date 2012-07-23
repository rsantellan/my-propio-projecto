<?php

/**
 * BasetemporadaAnual
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property date $fecha
 * @property integer $md_locacion_id
 * @property enum $tipo
 * @property mdLocacion $mdLocacion
 * 
 * @method date           getFecha()          Returns the current record's "fecha" value
 * @method integer        getMdLocacionId()   Returns the current record's "md_locacion_id" value
 * @method enum           getTipo()           Returns the current record's "tipo" value
 * @method mdLocacion     getMdLocacion()     Returns the current record's "mdLocacion" value
 * @method temporadaAnual setFecha()          Sets the current record's "fecha" value
 * @method temporadaAnual setMdLocacionId()   Sets the current record's "md_locacion_id" value
 * @method temporadaAnual setTipo()           Sets the current record's "tipo" value
 * @method temporadaAnual setMdLocacion()     Sets the current record's "mdLocacion" value
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasetemporadaAnual extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('temporada_anual');
        $this->hasColumn('fecha', 'date', null, array(
             'type' => 'date',
             'primary' => true,
             ));
        $this->hasColumn('md_locacion_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('tipo', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'A',
              1 => 'M',
              2 => 'B',
             ),
             'default' => 'B',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('mdLocacion', array(
             'local' => 'md_locacion_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}