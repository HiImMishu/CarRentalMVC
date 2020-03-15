<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('user', new Route('/users', array(
  '_controller' => 'Controllers\\UserController::indexAction'
)));

$routes->add('login', new Route('/login', array(
  '_controller' => 'Controllers\\LoginController::indexAction'
)));

return $routes;
