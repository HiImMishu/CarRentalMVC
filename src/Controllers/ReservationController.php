<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Simplex\App;
use Models\Reservation;
use Models\Car;
use Models\User;

class ReservationController extends App
{
  public function indexAction($id, Request $request)
  {
    //Jeśli nie wysłano formularza
    if (count($request->request->all()) == 0)
    {

      if (is_null($id))
        return $this->redirect('offer');

      $eM = $this->getEntityMenager();
      $car = $eM->getRepository('Models\Car')->find($id);
      if (is_null($car))
        return $this->render('Views/404.html.twig', ['firstName' => $this->getSession()->get('firstName')]);

      return $this->render('Views/reservation.html.twig', ['firstName' => $this->getSession()->get('firstName'), 'car' => $car]);

    }
    //Jeśli wysłąno formularz i jest zalogowany uzytkownik
    else if ($this->getSession()->has('id'))
    {

      $dateFrom = $request->request->get('dateFrom');
      $dateTo = $request->request->get('dateTo');

      $dateFromError = $this->validateDate($dateFrom);
      $dateToError = $this->validateDate($dateTo);

      if(($dateFrom >= $dateTo) && is_null($dateToError))
        $dateToError = "Data zwrotu musi być późniejsza niż data wynajmu.";

      if(!is_null($dateFromError) || !is_null($dateToError))
        return $this->render('Views/reservation.html.twig', ['firstName' => $this->getSession()->get('firstName'), 'dateFromError' => $dateFromError, 'dateToError' => $dateToError]);

      $takenError = $this->carAvailability($id, $dateFrom);

      //Jeśli samochód nie jest zarezerwowany
      if(is_null($takenError))
      {
        $eM = $this->getEntityMenager();

        $user = $eM->getRepository('Models\User')->find($this->getSession()->get('id'));
        $car = $eM->getRepository('Models\Car')->find($id);

        $reservation = new Reservation();
        $reservation->setCar($car);
        $reservation->setUser($user);

        $dateF = new \DateTime($dateFrom);
        $dateT = new \DateTime($dateTo);

        $reservation->setDateFrom($dateF);
        $reservation->setDateTo($dateT);

        $eM->persist($reservation);
        $eM->flush();

        return $this->render('Views/reservationSuccess.html.twig', ['firstName' => $this->getSession()->get('firstName')]);
      }
      //Jeśli samochód jest zarezerwowany
      else
        return $this->render('Views/reservation.html.twig', ['firstName' => $this->getSession()->get('firstName'), 'takenError' => $takenError]);

    }
    //Jeśli wysłąno formularz a Użytkownik nie jest zalogowany
    else
    {
      return $this->render('Views/reservation.html.twig', ['error' => "Musisz być zalogowany aby dokonać rezerwacji."]);
    }
  }

  private function carAvailability($id, $dateFrom)
  {
    $eM = $this->getEntityMenager();
    $query = $eM->createQuery('SELECT r FROM Models\Reservation r where r.car = :id AND r.dateTo >= :dateFrom');
    $query->setParameter('id', $id);
    $query->setParameter('dateFrom', $dateFrom);
    $reservations = $query->getResult();
    if(count($reservations) == 0)
      return null;
    else
      return "To auto jest już zarezerwowane w tym czasie";
  }

  private function validateDate($date)
  {
    if(strtotime($date))
      return null;
    else
      return "Błędna data";
  }

}
