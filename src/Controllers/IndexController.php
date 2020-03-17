<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Simplex\App;

class IndexController extends App
{
  public function indexAction()
  {
    if($this->getSession()->has('firstName'))
      return $this->render('Views/list.html.twig', ['firstName' => $this->getSession()->get('firstName')]);

    return $this->render('Views/list.html.twig');
  }
}
