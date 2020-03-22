<?php

namespace Controllers;

use Simplex\App;
use Models\Car;
use Models\ImageUrl;

class OfferController extends App
{
  public function indexAction($id)
  {

    if(!is_null($id))
      return $this->offerInfo($id);


    $eM = $this->getEntityMenager();

    $query = $eM->createQuery('SELECT c FROM Models\Car c');
    $cars = $query->getResult();

    return $this->render('Views/offer.html.twig', ['cars' => $cars]);
  }

  private function offerInfo($id)
  {
    $eM = $this->getEntityMenager();
    $images = $eM->getRepository('Models\ImageUrl')->findBy(['car' => $id]);
    if($images)
      $car = $images[0]->getCar();
    else
      $car = $eM->getRepository('Models\Car')->find($id);

    if(is_null($car))
      return $this->render('Views/404.html.twig');

    return $this->render('Views/offerInfo.html.twig', ['car' => $car, 'photos' => $images]);
  }

}
