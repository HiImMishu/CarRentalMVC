<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Models\User;
use Simplex\App;

class RegisterController extends App
{

  public function indexAction(Request $request)
  {
    if(count($request->request->all()) == 0)
      return $this->render('Views/register.html.twig');
    else
      return $this->register($request);
  }

  private function register(Request $request)
  {
    $eM = $this->getEntityMenager();
    $user = new User();

    $user = $eM->getRepository('Models\User')->findOneBy(['email' => $request->request->get('email')]);

    if(!is_null($user))
      return $this->render('Views/register.html.twig', ['emailErr' => 'Ten email jest już zajęty']);

    $firstNameErr = $this->validateFirstName($request->request->get('firstName'));
    $lastNameErr  = $this->validateLastName($request->request->get('lastName'));
    $emailErr     = $this->validateEmail($request->request->get('email'));
    $passwordErr  = $this->validatePassword($request->request->get('password'));
    $password2Err = $this->validateSeconPassword($request->request->get('password2'), $request->request->get('password'));

    $data = [
              'firstNameErr' => $firstNameErr,
              'lastNameErr'  => $lastNameErr,
              'emailErr'     => $emailErr,
              'passwordErr'  => $passwordErr,
              'password2Err' => $password2Err
            ];

    if (is_null($firstNameErr) && is_null($lastNameErr) && is_null($emailErr) && is_null($passwordErr) && is_null($password2Err)) {

      $user = new User();

      $password = password_hash($request->request->get('password'), PASSWORD_DEFAULT);

      $user->setFirstName($request->request->get('firstName'));
      $user->setLastName($request->request->get('lastName'));
      $user->setEmail($request->request->get('email'));
      $user->setPassword($password);

      $eM->persist($user);
      $eM->flush();

      $session = $this->getSession();
      $session->set('firstName', $user->getFirstName());
      return $this->redirect('/');
    }
    else {
      return $this->render('Views/register.html.twig', $data);
    }

  }

  private function validateFirstName($firstName)
  {
    if (strlen($firstName) == 0) {
      return "Imię nie moży być puste.";
    }
    else if (preg_match("/[^A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]/", $firstName)) {
      return "Imię może zawierać tylko litery.";
    }
    else {
      return null;
    }
  }

  private function validateLastName($lastName)
  {
    if (strlen($lastName) == 0) {
      return "Nazwisko nie moży być puste.";
    }
    else if (preg_match("/[^A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ-]/", $lastName)) {
      return "Nazwisko może zawierać tylko litery oraz znak \"-\".";
    }
    else {
      return null;
    }
  }

  private function validateEmail($email)
  {
    if (strlen($email) == 0) {
      return "Email nie moży być pusty.";
    }
    else if (preg_match("/^[-\w\.]+@([-\w]+\.)+[a-z]+$/i", $email) == false) {
      return "Email nieprawdłowy.";
    }
    else {
      return null;
    }
  }

  private function validatePassword($password)
  {
    if (strlen($password) < 8) {
      return "Hasło musi się składać przynajmniej z ośmiu znaków.";
    }
    else if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[\!\@\#\$\%\^\&\*\(\)\_\+\-\=])(?=.*[A-Z])(?!.*\s).{8,}$/", $password) == false) {
      return "Hasło musi zawierać co najmniej jedną cyfrę, co najmniej jedną dużą literę, co najmniej jedną małą literę i co najmniej jeden znak z grupy !@#$%^&*()_+-=";
    }
    else {
      return null;
    }
  }

  private function validateSeconPassword($password, $password2)
  {
    if (strcmp($password, $password2) != 0) {
      return "Hasła nie są identyczne.";
    }
    else {
      return null;
    }
  }

}
