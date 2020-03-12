<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Simplex\App;

class UserController extends App
{
  public function indexAction()
  {
    return $this->render('Views/list.html.twig');
  }
}
