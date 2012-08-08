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
          return false;
        }
        $mdUser = Doctrine::getTable("mdUser")->findOneBy("email", $email);
        if(!$mdUser)
        {
            $mdUser = new mdUser();
            $mdUser->setEmail($email);
            $mdUser->save();
            /*
            if(!is_null($name))
            {
              $mdPassport = new mdPassport();
              $mdPassport->setMdUser($mdUser);
              $mdPassport->setUsername(time());
              $mdPassport->save();
              $mdUserProfile = new mdUserProfile();
              $mdUserProfile->setName($name);
              $mdUserProfile->setMdUserIdTmp($mdUser->getId());
              $mdUserProfile->save();
            }
            */
        }
        $mdNewsLetterUser = Doctrine::getTable("mdNewsLetterUser")->findOneBy("md_user_id", $mdUser->getId());
        if(!$mdNewsLetterUser)
        {
            $mdNewsLetterUser = new mdNewsLetterUser();
            if(!is_null($name))
            {
              $mdNewsLetterUser->setName($name);
            }
            $mdNewsLetterUser->setMdUserId($mdUser->getId());
            $mdNewsLetterUser->save();
        }
				if($group !== null){
					if(is_numeric($group))
						$group = Doctrine::getTable('mdNewsLetterGroup')->find($group);
					else
						$group = Doctrine::getTable('mdNewsLetterGroup')->findOneByName($group);
					
					if($group){
						$group->addUser($mdNewsLetterUser);
					}
				}
        return $mdNewsLetterUser;
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
        
        foreach($list as $notSended)
        {
          $users = $notSended->getMdNewsletterSend();
          $count = 0;
          
          foreach($users as $user)
          {
            
            $email = $user->getMdNewsLetterUser()->getMdUser()->getEmail();
            mdMailHandler::sendSwiftMail("sistema@algo.com", $email, $notSended->getSubject(), $notSended->getBody(), false, "", array(), false);
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
            self::registerUser($user, $group, $name);
          }
          else
          {
            var_dump($my_data);
          }
          //self::processRow($data->sheets[0]['cells'][$i],$index);
          if ($index == $quantity_of_processing) {
              break;
          }
      }
      return $index;
  }  
  
  
}
