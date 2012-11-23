<?php

/**
 * BasemdLocacionTemporada
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $md_locacion_id
 * @property date $date_from
 * @property date $date_to
 * @property enum $tipo
 * @property mdLocacion $mdLocacion
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method integer             getMdLocacionId()   Returns the current record's "md_locacion_id" value
 * @method date                getDateFrom()       Returns the current record's "date_from" value
 * @method date                getDateTo()         Returns the current record's "date_to" value
 * @method enum                getTipo()           Returns the current record's "tipo" value
 * @method mdLocacion          getMdLocacion()     Returns the current record's "mdLocacion" value
 * @method mdLocacionTemporada setId()             Sets the current record's "id" value
 * @method mdLocacionTemporada setMdLocacionId()   Sets the current record's "md_locacion_id" value
 * @method mdLocacionTemporada setDateFrom()       Sets the current record's "date_from" value
 * @method mdLocacionTemporada setDateTo()         Sets the current record's "date_to" value
 * @method mdLocacionTemporada setTipo()           Sets the current record's "tipo" value
 * @method mdLocacionTemporada setMdLocacion()     Sets the current record's "mdLocacion" value
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdLocacionTemporada extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_locacion_temporada');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('md_locacion_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('date_from', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('date_to', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('tipo', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Invierno',
              1 => 'Primavera / Otoño',
              2 => 'Reveillon',
              3 => 'Enero',
              4 => 'Febrero',
             ),
             'default' => 'Enero',
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