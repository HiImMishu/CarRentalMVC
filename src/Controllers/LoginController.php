<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Models\User;
use Simplex\App;

class LoginController extends App
{
  public function indexAction(Request $request)
  {
    if(count($request->request->all()) == 0)
      return $this->render('Views/login.html.twig');
    else
      return $this->login($request);
  }

  public function login(Request $request)
  {
    $user = new User();

    $eM = $this->getEntityMenager();

    $user = $eM->getRepository('Models\User')->findOneBy(['email' => $request->request->get('email')]);
    $emailError = is_null($user) ? "Użytkownik o takim adresie nie istnieje." : null;

    $user = $eM->getRepository('Models\User')->findOneBy(['email' => $request->request->get('email'), 'password' => $request->request->get('password')]);
    $passwordError = is_null($user) && is_null($emailError) ? "Niepoprawne hasło" : null;

    if(!is_null($emailError) || !is_null($passwordError))
      return $this->render('Views/login.html.twig', array(
        'emailError' => $emailError,
        'passwordError' => $passwordError,
        'email' => $request->request->get('email')
      ));
    else
    {
      $this->getSession()->set('firstName', $user->getFirstName());
      return $this->redirect('/');
    }
  }

  public function sanitizeString($string)
  {
    if (get_magic_quotes_gpc())
      $string = stripslashes($string);
    $string = strip_tags($string);
    $string = htmlentities($string);
    return $string;
  }
}
