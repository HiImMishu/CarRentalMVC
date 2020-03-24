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
    $passwordError = null;

    $eM = $this->getEntityMenager();

    $user = $eM->getRepository('Models\User')->findOneBy(['email' => $request->request->get('email')]);
    $emailError = is_null($user) ? "Użytkownik o takim adresie nie istnieje." : null;

    if(is_null($emailError))
        $passwordError = password_verify($request->request->get('password'), $user->getPassword()) ? null : "Niepoprawne hasło";

    if(!is_null($emailError) || !is_null($passwordError))
      return $this->render('Views/login.html.twig', array(
        'emailError' => $emailError,
        'passwordError' => $passwordError,
        'email' => $request->request->get('email')
      ));
    else
    {
      $this->getSession()->set('firstName', $user->getFirstName());
      $this->getSession()->set('id', $user->getId());
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
