<?php

namespace Controllers;

use Simplex\App;

class ProfileController extends App
{
  public function indexAction()
  {
    if(!$this->getSession()->has('id'))
      return $this->render('Views/404.html.twig');

    $reservationList = $this->getReservations();

    return $this->render('Views/profile.html.twig', ['firstName' => $this->getSession()->get('firstName'), 'reservations' => $reservationList]);
  }

  public function getReservations()
  {
    $id = $this->getSession()->get('id');

    $eM = $this->getEntityMenager();

    $query = $eM->creAteQuery('SELECT r from Models\Reservation r where r.user = :id AND r.dateTo >= :date');
    $query->setParameter('id', $id);
    $query->setParameter('date', date("Y-m-d"));

    return $query->getResult();
  }
}
