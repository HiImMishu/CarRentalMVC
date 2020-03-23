<?php

namespace Models;

use Models\User;
use Models\Car;

/** @Entity @Table(name = "Reservation") */

class Reservation
{
  /** @Id @Column(type = "integer") @GeneratedValue */
  private $id;

  /** @ManyToOne(targetEntity = "Car") */
  private $car;

  /** @ManyToOne(targetEntity = "User") */
  private $user;

  /** @dateFom @Column(type = "date") */
  private $dateFrom;

  /** @dateTo @Column(type = "date") */
  private $dateTo;

  public function getCar(): ?Car
  {
      return $this->car;
  }

  public function setCar(?Car $car): self
  {
      $this->car = $car;

      return $this;
  }

  public function getUser(): ?User
  {
    return $this->user;
  }

  public function setUser(?User $user): self
  {
    $this->user = $user;

    return $this;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getdateFrom()
  {
    return $this->dateFrom;
  }

  public function setDateFrom($dateFrom)
  {
    $this->dateFrom = $dateFrom;
  }

  public function getDateTo()
  {
    return $this->dateTo;
  }

  public function setDateTo($dateTo)
  {
    $this->dateTo = $dateTo;
  }
}
