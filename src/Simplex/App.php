<?php

namespace Simplex;

use Simplex\Providers\TwigServiceProvider;
use Simplex\Providers\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing;

class App
{
  private $config;

  private $view;

  private $entityMenager;

  private $urlGenerator;

  private $session;

  public function __construct()
  {
    $this->loadConfig();

    $routes = include __DIR__.'/../routes.php';
    $this->urlGenerator = new UrlGenerator($routes, new Routing\RequestContext());

    $twig = new TwigServiceProvider($this->config['twig']);
    $this->view = $twig->provide(array(
      'urlGenerator'  =>   $this->urlGenerator
    ));

    $doctrine = new DoctrineServiceProvider($this->config['database']);
    $this->entityMenager = $doctrine->provide();

    $this->session = new Session();
    $this->session->start();

  }

  public function render($name, $data = [])
  {
    $body = $this->view->render($name, $data);

    return new Response($body);
  }

  public function getEntityMenager()
  {
    return $this->entityMenager;
  }

  private function loadConfig()
  {
    $this->config = include(__DIR__.'/../config.php');
  }

  protected function redirect($path, $data = [])
  {
    return new RedirectResponse($path);
  }

  protected function getSession()
  {
    return $this->session;
  }
};
