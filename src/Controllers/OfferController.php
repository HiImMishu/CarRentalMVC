<?php

namespace Controllers;

use Simplex\App;
use Models\Car;

class OfferController extends App
{
  public function indexAction()
  {

    $eM = $this->getEntityMenager();

    $query = $eM->createQuery('SELECT c FROM Models\Car c');
    $cars = $query->getResult();

    return $this->render('Views/offer.html.twig', ['cars' => $cars]);
  }
}
