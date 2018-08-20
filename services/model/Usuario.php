<?php

/**
 *
 */
class Usuario {

  public $id;
  public $username;
  public $password;
  public $email;
  public $profile;

  public function isAdmin(){
    if ($this->profile == 1) {
      return true;
    } else {
      return false;
    }
  }

}

?>
