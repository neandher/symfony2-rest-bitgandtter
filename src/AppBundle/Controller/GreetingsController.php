<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as FOSRestBundleAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Greetings\Hello;

/**
 * @FOSRestBundleAnnotations\View()
 */
class GreetingsController extends FOSRestController implements ClassResourceInterface
{
    public function helloAction()
    {
        return new Hello();
    }
}