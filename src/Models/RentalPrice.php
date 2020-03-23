<?php

namespace Models;

/** @Entity @Table(name = "RentalPrice") */

class RentalPrice
{
  /** @Id @Column(type = "integer") @GeneratedValue */
  private $id;

  /**
   * @ManyToOne(targetEntity="Car")
   */
   private $car;

   /** @timePeriod @Column(type = "string") */
   private $timePeriod;

   /** @price @Column(type = "string") */
   private $price;

   public function getId()
   {
     return $this->id;
   }

   public function setId($id)
   {
     $this->id = $id;
   }

   public function getTimePeriod()
   {
     return $this->timePeriod;
   }

   public function setTimePeriod($timePeriod)
   {
     $this->timePeriod = $timePeriod;
   }

   public function getPrice()
   {
     return $this->price;
   }

   public function setPrice($price)
   {
     $this->price = $price;
   }
}
