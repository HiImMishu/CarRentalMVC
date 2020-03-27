<?php

namespace Controllers;

use Simplex\App;

class AboutCompanyController extends App
{
  public function indexAction()
  {
    return $this->render('Views/aboutCompany.html.twig', ['firstName' => $this->getSession()->get('firstName')]);
  }
}
