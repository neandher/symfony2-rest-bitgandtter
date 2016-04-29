<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as FOSRestBundleAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Greetings\Hello;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * @FOSRestBundleAnnotations\View()
 */
class GreetingsController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Response with a nice "Hello" greeting message
     *
     * @ApiDoc(
     *  section="Greetings",
     *  resource=true,
     *  description="Response with a Hello greeting",
     *  statusCodes={
     *         200="Returned when successful"
     *  },
     *  tags={
     *   "stable" = "#4A7023",
     *  }
     * )
     */
    public function helloAction()
    {
        return new Hello();
    }
}