<?php
class auctioneers extends Staff
{
  private $speciality;
  private $experiance;
  private $picture;
  public function __construct($name,$lastName,$age,$speciality,$experiance,$picture)
  {
  $this->speciality = $speciality;
  $this->experiance = $experiance;
  $this->picture = $picture;
  parent::__construct($name,$lastName,$age);
}
  public function getSpeciality()
  {
    return $this->speciality;
  }

  public function getExperiance()
  {
    return $this->experiance;
  }

  public function getPicture()
  {
    return $this->picture;
  }

}
 ?>
