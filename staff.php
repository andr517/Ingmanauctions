<?php
class Staff
{
  private $name;
  private $lastName;
  private $age;

  public function __construct($name,$lastName,$age)
  {
    $this->name = $name;
    $this->lastName = $lastName;
    $this->age = $age;
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
}
 ?>
