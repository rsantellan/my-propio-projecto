<?php

/**
 * BasemdOcupacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $md_apartamento_id
 * @property timestamp $fecha
 * @property mdApartamento $mdApartamento
 * 
 * @method integer       getId()                Returns the current record's "id" value
 * @method integer       getMdApartamentoId()   Returns the current record's "md_apartamento_id" value
 * @method timestamp     getFecha()             Returns the current record's "fecha" value
 * @method mdApartamento getMdApartamento()     Returns the current record's "mdApartamento" value
 * @method mdOcupacion   setId()                Sets the current record's "id" value
 * @method mdOcupacion   setMdApartamentoId()   Sets the current record's "md_apartamento_id" value
 * @method mdOcupacion   setFecha()             Sets the current record's "fecha" value
 * @method mdOcupacion   setMdApartamento()     Sets the current record's "mdApartamento" value
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdOcupacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_ocupacion');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('md_apartamento_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('fecha', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('mdApartamento', array(
             'local' => 'md_apartamento_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}