<?php

namespace Models;

use Models\Car;

/**
  *@Entity @Table(name ="ImageUrl")
  */

class ImageUrl
{
  /** @Id @Column(type = "integer") @GeneratedValue */
  private $id;

  /**
   * @ManyToOne(targetEntity="Car", inversedBy="imageUrl")
   */
  private $car;

  /** @ImageUrl @Column(type = "string") */
  private $imageUrl;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getCar(): ?Car
  {
      return $this->car;
  }

  public function setCar(?Car $car): self
  {
      $this->car = $car;

      return $this;
  }

  public function getImageUrl()
  {
    return $this->imageUrl;
  }

  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }

}
