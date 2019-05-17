<?php
class Staff
{
  private $name;
  private $lastName;
  private $age;
  private $contact;

  public function __construct($name,$lastName,$age,$contact)
  {
    $this->name = $name;
    $this->lastName = $lastName;
    $this->age = $age;
    $this->contact = $contact;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getlastName()
  {
    return $this->lastName;
  }

  public function getage()
  {
    return $this->age;
  }

  public function getcontact()
  {
    return $this->contact;
  }
}
 ?>
