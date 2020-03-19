<?php

namespace Models;

/**
  *@Entity @ImageUrl(name =" ImageUrl")
  */

class Car
{
  /** @Id @Column(type = "integer") @GeneratedValue */
  private $id;

  /** @ImageUrl @Column(type = "string") */
  private $imageMainUrl;

  /** @Brand @Column(type = "string") */
  private $brand;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getImageMainUrl()
  {
    return $this->imageMainUrl;
  }

  public function setImageMainUrl($imageMainUrl)
  {
    $this->imageMainUrl = $imageMainUrl;
  }

  public function getBrand()
  {
    return $this->brand;
  }

  public function setBrand($brand)
  {
    $this->brand = $brand;
  }

}
