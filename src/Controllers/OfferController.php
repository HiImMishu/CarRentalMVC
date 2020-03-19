<?php

namespace Controllers;

use Simplex\App;
use Models\Car;
use Models\ImageUrl;

class OfferController extends App
{
  public function indexAction()
  {
    $car = new Car();
    $imageUrl = new ImageUrl();

    $eM = $this->getEntityMenager();

    $imageUrl = $eM->getRepository('Models\ImageUrl')->find(1);
    $car = $imageUrl->getCar();

    return $this->render('Views/offer.html.twig', ['imageUrl' => $imageUrl->getImageUrl(), 'carUrl' => $car->getImageMainUrl()]);
  }
}
