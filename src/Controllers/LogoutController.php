<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Simplex\App;

class LogoutController extends App
{
  public function indexAction()
  {
    $this->getSession()->invalidate();

    return $this->redirect('/');
  }
}
