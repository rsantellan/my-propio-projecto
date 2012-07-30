<?php

/**
 * BasemdUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $email
 * @property integer $super_admin
 * @property string $culture
 * @property timestamp $deleted_at
 * @property Doctrine_Collection $mdGenericSale
 * @property Doctrine_Collection $mdNewsLetterUser
 * @property Doctrine_Collection $mdContent
 * @property Doctrine_Collection $mdPassport
 * @property Doctrine_Collection $mdUserSearch
 * @property Doctrine_Collection $mdBlockedUsers
 * @property Doctrine_Collection $mdApartamento
 * @property Doctrine_Collection $mdReserva
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getEmail()            Returns the current record's "email" value
 * @method integer             getSuperAdmin()       Returns the current record's "super_admin" value
 * @method string              getCulture()          Returns the current record's "culture" value
 * @method timestamp           getDeletedAt()        Returns the current record's "deleted_at" value
 * @method Doctrine_Collection getMdGenericSale()    Returns the current record's "mdGenericSale" collection
 * @method Doctrine_Collection getMdNewsLetterUser() Returns the current record's "mdNewsLetterUser" collection
 * @method Doctrine_Collection getMdContent()        Returns the current record's "mdContent" collection
 * @method Doctrine_Collection getMdPassport()       Returns the current record's "mdPassport" collection
 * @method Doctrine_Collection getMdUserSearch()     Returns the current record's "mdUserSearch" collection
 * @method Doctrine_Collection getMdBlockedUsers()   Returns the current record's "mdBlockedUsers" collection
 * @method Doctrine_Collection getMdApartamento()    Returns the current record's "mdApartamento" collection
 * @method Doctrine_Collection getMdReserva()        Returns the current record's "mdReserva" collection
 * @method mdUser              setId()               Sets the current record's "id" value
 * @method mdUser              setEmail()            Sets the current record's "email" value
 * @method mdUser              setSuperAdmin()       Sets the current record's "super_admin" value
 * @method mdUser              setCulture()          Sets the current record's "culture" value
 * @method mdUser              setDeletedAt()        Sets the current record's "deleted_at" value
 * @method mdUser              setMdGenericSale()    Sets the current record's "mdGenericSale" collection
 * @method mdUser              setMdNewsLetterUser() Sets the current record's "mdNewsLetterUser" collection
 * @method mdUser              setMdContent()        Sets the current record's "mdContent" collection
 * @method mdUser              setMdPassport()       Sets the current record's "mdPassport" collection
 * @method mdUser              setMdUserSearch()     Sets the current record's "mdUserSearch" collection
 * @method mdUser              setMdBlockedUsers()   Sets the current record's "mdBlockedUsers" collection
 * @method mdUser              setMdApartamento()    Sets the current record's "mdApartamento" collection
 * @method mdUser              setMdReserva()        Sets the current record's "mdReserva" collection
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_user');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('email', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 128,
             ));
        $this->hasColumn('super_admin', 'integer', 1, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('culture', 'string', 2, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2,
             ));
        $this->hasColumn('deleted_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('mdGenericSale', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdNewsLetterUser', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdContent', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdPassport', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdUserSearch', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdBlockedUsers', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdApartamento', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdReserva', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}