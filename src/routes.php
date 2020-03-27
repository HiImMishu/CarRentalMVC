<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('Index', new Route('/', array(
  '_controller' => 'Controllers\\IndexController::indexAction'
)));

$routes->add('login', new Route('/login', array(
  '_controller' => 'Controllers\\LoginController::indexAction'
)));

$routes->add('logout', new Route('/logout', array(
  '_controller' => 'Controllers\\LogoutController::indexAction'
)));

$routes->add('register', new Route('/register', array(
  '_controller' => 'Controllers\\RegisterController::indexAction'
)));

$routes->add('offer', new Route('/offer/{id}', array(
  '_controller' => 'Controllers\\OfferController::indexAction',
  'id'          => null
)));

$routes->add('reservation', new Route('/reservation/{id}', array(
  '_controller' => 'Controllers\\ReservationController::indexAction',
  'id'          => null
)));

$routes->add('profile', new Route('/profile', array(
  '_controller' => 'Controllers\\ProfileController::indexAction'
)));

$routes->add('contact', new Route('/contact', array(
  '_controller' => 'Controllers\\ContactController::indexAction'
)));

$routes->add('aboutCompany', new Route('/company', array(
  '_controller' => 'Controllers\\AboutCompanyController::indexAction'
)));

return $routes;
