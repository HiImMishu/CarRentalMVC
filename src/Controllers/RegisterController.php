<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Simplex\App;

class RegisterController extends App
{
  public function indexAction()
  {
    return $this->render('Views/register.html.twig');
  }
}
