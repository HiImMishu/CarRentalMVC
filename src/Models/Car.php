<?php

namespace Models;

/**
  *@Entity @Table(name ="Car")
  */

class Car
{
  /** @Id @Column(type = "integer") @GeneratedValue */
  private $id;

  /** @ImageUrl @Column(type = "string") */
  private $imageMainUrl;

  /** @Brand @Column(type = "string") */
  private $brand;

  /** @Model @column(type = "string") */
  private $model;

  /** @ProductionYear @Column(type = "integer") */
  private $productionYear;

  /** @Engine @Column(type = "string") */
  private $engine;

  /** @Power @Column(type = "integer") */
  private $power;

  /** @Drive @Column(type = "string") */
  private $drive;

  /** @GearBox @Column(type = "string") */
  private $gearBox;

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

  public function getModel()
  {
    return $this->model;
  }

  public function setModel($model)
  {
    $this->model = $model;
  }

  public function getProductionYear()
  {
    return $this->productionYear;
  }

  public function setProductionYear($productionYear)
  {
    $this->productionYear = $productionYear;
  }

  public function getEngine()
  {
    return $this->engine;
  }

  public function setEngine($engine)
  {
    $this->engine = $engine;
  }

  public function getPower()
  {
    return $this->power;
  }

  public function setPower($power)
  {
    $this->power = $power;
  }

  public function getDrive()
  {
    return $this->drive;
  }

  public function setDrive($drive)
  {
    $this->drive = $drive;
  }

  public function getGearBox()
  {
    return $this->gearBox;
  }

  public function setGearBox()
  {
    $this->gearBox = $gearBox;
  }

}
