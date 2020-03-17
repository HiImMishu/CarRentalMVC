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
return $routes;
