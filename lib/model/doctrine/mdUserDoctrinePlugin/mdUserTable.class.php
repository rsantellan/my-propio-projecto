<?php

/**
 * mdUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class mdUserTable extends PluginmdUserTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object mdUserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('mdUser');
    }
    
    public function userHasPassport($email)
    {
      $conn = Doctrine_Manager::getInstance()->getCurrentConnection(); 
      $sql = "SELECT count(id) as suma FROM md_passport where md_user_id = (SELECT id FROM md_user m where email = ?)";
      $r = $conn->fetchOne($sql, array($email));
      return (int) $r;
      var_dump($r);
    }
}