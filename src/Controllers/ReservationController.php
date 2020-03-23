<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Simplex\App;
use Models\Reservation;

class ReservationController extends App
{
  public function indexAction($id)
  {
    $reservation = new Reservation();
    return $this->render('Views/reservation.html.twig', ['id'=>$id]);
  }
}
