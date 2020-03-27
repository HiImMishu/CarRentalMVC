<?php

namespace Controllers;

use Simplex\App;

class ProfileController extends App
{
  public function indexAction()
  {
    return $this->render('Views/profile.html.twig', ['firstName' => $this->getSession()->get('firstName')]);
  }
}
