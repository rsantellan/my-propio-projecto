<?php

/**
 * BasemdPassport
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $md_user_id
 * @property string $username
 * @property string $password
 * @property integer $account_active
 * @property integer $account_blocked
 * @property timestamp $last_login
 * @property mdUser $mdUser
 * @property Doctrine_Collection $RememberKeys
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getMdUserId()        Returns the current record's "md_user_id" value
 * @method string              getUsername()        Returns the current record's "username" value
 * @method string              getPassword()        Returns the current record's "password" value
 * @method integer             getAccountActive()   Returns the current record's "account_active" value
 * @method integer             getAccountBlocked()  Returns the current record's "account_blocked" value
 * @method timestamp           getLastLogin()       Returns the current record's "last_login" value
 * @method mdUser              getMdUser()          Returns the current record's "mdUser" value
 * @method Doctrine_Collection getRememberKeys()    Returns the current record's "RememberKeys" collection
 * @method mdPassport          setId()              Sets the current record's "id" value
 * @method mdPassport          setMdUserId()        Sets the current record's "md_user_id" value
 * @method mdPassport          setUsername()        Sets the current record's "username" value
 * @method mdPassport          setPassword()        Sets the current record's "password" value
 * @method mdPassport          setAccountActive()   Sets the current record's "account_active" value
 * @method mdPassport          setAccountBlocked()  Sets the current record's "account_blocked" value
 * @method mdPassport          setLastLogin()       Sets the current record's "last_login" value
 * @method mdPassport          setMdUser()          Sets the current record's "mdUser" value
 * @method mdPassport          setRememberKeys()    Sets the current record's "RememberKeys" collection
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdPassport extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_passport');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('md_user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('username', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('account_active', 'integer', 1, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('account_blocked', 'integer', 1, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('mdUser', array(
             'local' => 'md_user_id',
             'foreign' => 'id'));

        $this->hasMany('mdPassportRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'md_passport_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}