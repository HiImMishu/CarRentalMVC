<?php
namespace Controllers;

use Simplex\App;

class ContactController extends App
{
  public function indexAction()
  {
    return $this->render('Views/contact.html.twig', ['firstName' => $this->getSession()->get('firstName')]);
  }
}
