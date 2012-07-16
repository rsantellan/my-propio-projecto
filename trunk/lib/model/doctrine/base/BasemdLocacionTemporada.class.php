<?php

/**
 * BasemdLocacionTemporada
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $md_locacion_id
 * @property integer $dia_desde
 * @property integer $mes_desde
 * @property integer $dia_hasta
 * @property integer $mes_hasta
 * @property enum $tipo
 * @property mdLocacion $mdLocacion
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method integer             getMdLocacionId()   Returns the current record's "md_locacion_id" value
 * @method integer             getDiaDesde()       Returns the current record's "dia_desde" value
 * @method integer             getMesDesde()       Returns the current record's "mes_desde" value
 * @method integer             getDiaHasta()       Returns the current record's "dia_hasta" value
 * @method integer             getMesHasta()       Returns the current record's "mes_hasta" value
 * @method enum                getTipo()           Returns the current record's "tipo" value
 * @method mdLocacion          getMdLocacion()     Returns the current record's "mdLocacion" value
 * @method mdLocacionTemporada setId()             Sets the current record's "id" value
 * @method mdLocacionTemporada setMdLocacionId()   Sets the current record's "md_locacion_id" value
 * @method mdLocacionTemporada setDiaDesde()       Sets the current record's "dia_desde" value
 * @method mdLocacionTemporada setMesDesde()       Sets the current record's "mes_desde" value
 * @method mdLocacionTemporada setDiaHasta()       Sets the current record's "dia_hasta" value
 * @method mdLocacionTemporada setMesHasta()       Sets the current record's "mes_hasta" value
 * @method mdLocacionTemporada setTipo()           Sets the current record's "tipo" value
 * @method mdLocacionTemporada setMdLocacion()     Sets the current record's "mdLocacion" value
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
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
        $this->hasColumn('dia_desde', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('mes_desde', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('dia_hasta', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('mes_hasta', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('tipo', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'A',
              1 => 'M',
             ),
             'default' => 'A',
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