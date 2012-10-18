<?php

class mdNewsletterHandler
{
		/**
		 * Agrega un email como mdUser y lo registra como newsletterUser. 
		 * 
		 * Si recibe grupo ya lo asigna como parte de un grupo. Si la variabel es numerica se toma como el id, sino como el name
		 *
		 * @param string $email 
		 * @param string $group 
		 * @return void
		 * @author maui .-
		 */
		
    public static function registerUser($email, $group = null, $name = null)
    {
        if(!mdBasicFunction::validEmail($email))
        {
          sfContext::getInstance()->getLogger()->err(" Email invalido ".$email);
          return false;
        }
        try
        {
            $conn = Doctrine_Manager::getInstance()->getCurrentConnection(); 
            $sql = "SELECT m.id AS id FROM md_user m WHERE (m.email = ?) LIMIT 1";
            //$email = "1051@asdas.com";
            $r = $conn->fetchOne($sql, array($email));
            if(!$r)
            {
                $sql_insert_user = "INSERT INTO md_user (super_admin, email, culture, created_at, updated_at) VALUES (0, ?, 'es', '2012-10-18 16:07:37', '2012-10-18 16:07:37')";
                $sql_insert_user_search = "INSERT INTO md_user_search (active, blocked, admin, show_email, md_user_id, email, created_at, updated_at) VALUES (0, 0, 0, 0, ?, ?, '2012-10-18 16:07:37', '2012-10-18 16:07:37')";
                //var_dump(get_class($conn));
                $resultado = $conn->execute($sql_insert_user, array($email));
                $r = $conn->lastInsertId('id');
                $conn->execute($sql_insert_user_search, array($r, $email));
                /*
                var_dump('aca??');
                $email = $email."a";
                $mdUser = new mdUser();
                $mdUser->setEmail($email);
                $mdUser->save();
                */
            }
//            die('term,in');
//            throw new Exception("oh no", 564654);

            $sql_news_letter_user = "SELECT m.id AS id FROM md_news_letter_user m WHERE (m.md_user_id = ?) LIMIT 1";
            $id_newsletter = $conn->fetchOne($sql_news_letter_user, array($r));
            if(!$id_newsletter)
            {
                $sql_insert_news_letter_user = "INSERT INTO md_news_letter_user (name, md_user_id, created_at, updated_at) VALUES (?, ?, '2012-10-18 16:48:28', '2012-10-18 16:48:28')";
                $conn->execute($sql_insert_news_letter_user, array($name, $r));
                $id_newsletter = $conn->lastInsertId('id');
            }
            
            if($group !== null)
            {
                $sql_insert_groups = "REPLACE INTO md_news_letter_group_user (md_newsletter_group_id, md_newsletter_user_id, created_at, updated_at) VALUES (?, ?, '2012-10-18 16:48:29', '2012-10-18 16:48:29')";
                $conn->execute($sql_insert_groups, array(intval($group), $id_newsletter));
            }
            return true;
        }
        catch(Exception $e)
        {
            sfContext::getInstance()->getLogger()->err(" Error en mdNewsletterHandler ".$e->getMessage());
            throw $e;
        }
        
        return false;
        
				
        
    }
    
    public static function retriveAll()
    {
      return Doctrine::getTable("mdNewsLetterUser")->findAll();
    }
    
    public static function retrieveUsers($page = null, $limit = null)
    {
        return Doctrine::getTable("mdNewsLetterUser")->retrieveAllUsersOfNewsLetter($page, $limit);
    }

    public static function retrieveNewsletters($page = null, $limit = null)
    {
        return Doctrine::getTable("mdNewsLetterUser")->retrieveNewsletters($page, $limit);
    }

    public static function retrieveNumberOfUserInNewsLetter()
    {
        $list = Doctrine::getTable("mdNewsLetterUser")->retrieveAllNewsLettersIds();
        return count($list);
    }
    
    public static function retrieveAllMdNewsletterContents()
    {
      return Doctrine::getTable("mdNewsletterContent")->retrieveAdminQuery();
    }
    
    public static function retrieveNewsLetterUserByEmail($email)
    {
      return Doctrine::getTable("mdNewsLetterUser")->retrieveNewsLetterUserByEmail($email);
    }
    
    public static function sendEmailToSomeUsers($mdNewsletterContentSendedId, $listOfUsersIds)
    {
      foreach($listOfUsersIds as $userId)
      {
        $mdNewsletterSend = new mdNewsletterSend();
        $mdNewsletterSend->setMdNewsLetterUserId($userId);
        $mdNewsletterSend->setMdNewsletterContentSendedId($mdNewsletterContentSendedId);
        $mdNewsletterSend->save();
      }      
    }
    
    public static function sendEmailToGroups($mdNewsletterContentSendedId, $groupsIds)
    {
      foreach($groupsIds as $groupId)
      {
        $groupUserList = Doctrine::getTable("mdNewsLetterGroupUser")->findBy("md_newsletter_group_id", $groupId);
        foreach($groupUserList as $user)
        {
          $mdNewsletterSend = new mdNewsletterSend();
          $mdNewsletterSend->setMdNewsLetterUserId($user->getMdNewsletterUserId());
          $mdNewsletterSend->setMdNewsletterContentSendedId($mdNewsletterContentSendedId);
          $mdNewsletterSend->save();          
        }
        $mdNewsLetterGroupSended = new mdNewsLetterGroupSended();
        $mdNewsLetterGroupSended->setMdNewsletterContendSendedId($mdNewsletterContentSendedId);
        $mdNewsLetterGroupSended->setMdNewsletterGroupId($groupId);
        $mdNewsLetterGroupSended->save();
      }      
    }
    
    public static function sendEmailToAllUsers($mdNewsletterContentSendedId)
    {
      $users = self::retriveAll();
      foreach($users as $user)
      {
        $mdNewsletterSend = new mdNewsletterSend();
        $mdNewsletterSend->setMdNewsLetterUserId($user->getId());
        $mdNewsletterSend->setMdNewsletterContentSendedId($mdNewsletterContentSendedId);
        $mdNewsletterSend->save();
      }
      
    }
    
    public static function retrieveNotSendedMails()
    {
      return Doctrine::getTable("mdNewsletterContentSended")->retrieveNotSended();
    }
    
    public static function retrieveAllMdNewsletterContentSendedOfId($id)
    {
      return Doctrine::getTable("mdNewsletterContentSended")->retrieveAllMdNewsletterContentSendedOfId($id);
    }
    
    public static function sendAllNotSendedMails()
    {
        $list = self::retrieveNotSendedMails();
        //var_dump('estoy aca');
        foreach($list as $notSended)
        {
          $users = $notSended->getMdNewsletterSend();
          $count = 0;
          
          foreach($users as $user)
          {
            
            $email = $user->getMdNewsLetterUser()->getMdUser()->getEmail();
            $from = array("name" => "Rent n' Chill", "email" => "info@rentnchill.com");
            mdMailHandler::sendSwiftMail($from, $email, $notSended->getSubject(), $notSended->getBody(), false, "", array(), false);
            $count++;
          }
          $notSended->setSendCounter($notSended->getSendCounter() + $count);
          $notSended->setSended(true);
          $notSended->save();
        }
        
    }
  
  public static function importUsersCsv($filename)
  {
    if ($fh = fopen($filename, "r"))
    {
      while (!feof($fh)) {
        $line = fgets($fh);
        $list = explode(',', $line);
        $group = 1;
        if(count($list) >= 2)
        {
          $name = $list[0];
          $email = $list[1];
          if(isset($list[2]))
          {
            $group = (int) $list[2];
          }
          $name = trim($name);
          $email = trim($email);
          //var_dump($name.",".$email);
          self::registerUser($email, $group, $name);
        }
      }
      fclose($fh);
    }
    else
    {
      return false;
    }
  }
    
  public static function importUsers($file, $extension)
  {
    if($extension == ".xls")
    {
      $index = 0;
      $row = 2;
      $return = 0;

      $return = self::proccessExcelBulkImport($file, $row);
      
    }
  }
  
  private static function proccessExcelBulkImport($file, $row, $quantity_of_processing = 20000000) {
      $data = new Spreadsheet_Excel_Reader();
      $data->setOutputEncoding('CP1251'); // Set output Encoding.
      
      $data->read($file);
      
      $index = 0;
      $counter = 0;
      for ($i = $row; $i <= count($data->sheets[0]['cells']); $i++) {
          $index++;
          
          $my_data = $data->sheets[0]['cells'][$i];
          $user = null;
          $name = null;
          $group = 1;
          if(isset($my_data[1]))
          {
            $user = $my_data[1];
          }
          if(isset($my_data[2]))
          {
            $name = $my_data[2];
          }
          if(isset($my_data[3]))
          {
            $group = $my_data[3];
          }
          
          if(!is_null($user))
          {
            sfContext::getInstance()->getLogger()->info(" Usuario: ".$user);  
            sfContext::getInstance()->getLogger()->info(" Grupo: ".$group);  
            sfContext::getInstance()->getLogger()->info(" Nombre: ".$name);  
            self::registerUser($user, $group, $name);
          }
          else
          {
            sfContext::getInstance()->getLogger()->err(" Error al guardar newsletter ".implode("|", $my_data));  
          }
          //self::processRow($data->sheets[0]['cells'][$i],$index);
          if ($index == $quantity_of_processing) {
              break;
          }
          if($counter == 50)
          {
              sleep(5);
              $counter = 0;
              set_time_limit ( 90 );
          }
          $counter ++;
      }
      return $index;
  }  
  
  
}
