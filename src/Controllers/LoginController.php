<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Simplex\App;

class LoginController extends App
{
  public function indexAction()
  {
    return $this->render('Views/login.html.twig');
  }
}
