<?php

namespace Simplex\Providers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Symfony\Component\Routing\Generator\UrlGenerator;

class TwigServiceProvider extends ServiceProvider
{
  public function provide(array $options = [])
  {
    $loader = new FilesystemLoader($this->config['dir']);
    $twig =  new Environment($loader, array(
      'cache'         =>   $this->config['cache'],
      'auto_reload'   =>   true
    ));

    if(!isset($options['urlGenerator']) || false == $options['urlGenerator'] instanceof UrlGenerator) {
      throw new \Exception('twig provide must have urlGenerator');
    }

    $functionAsset = new \Twig\TwigFunction('asset', function ($filename) {
      return '/assets/'.$filename;
    });

    $functionUrl = new \Twig\TwigFunction('url', function ($name, $parameters = []) use ($options) {
      return $options['urlGenerator']->generate($name, $parameters);
    });

    $twig->addFunction($functionAsset);
    $twig->addFunction($functionUrl);

    return $twig;
  }
}
