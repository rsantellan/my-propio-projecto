<?php

class registerUserComponents extends sfComponents {
  
  public function executeRegisterUser() 
  {
    $this->form = new userRegisterForm();
  }
}
