<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Simplex\App;
use Models\Car;
use Models\ImageUrl;

class IndexController extends App
{
  public function indexAction()
  {
    $eM = $this->getEntityMenager();

    $query = $eM->createQuery('SELECT c FROM Models\Car c');
    $cars = $query->getResult();

    return $this->render('Views/list.html.twig', ['firstName' => $this->getSession()->get('firstName'), 'cars' => $cars]);

    return $this->render('Views/list.html.twig', ['cars' => $cars]);
  }
}
