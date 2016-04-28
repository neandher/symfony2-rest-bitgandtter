<?php

namespace AppBundle\Controller;

use GuzzleHttp\Client as GuzzleHttpClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    private function getInstances()
    {
        $client = new GuzzleHttpClient();
        $response = $client->get('https://10.0.0.1/api/v1/pods', ['verify' => false]);
        $apiResponse = json_decode($response->getBody()->getContents());
        $response = [];
        foreach ($apiResponse->items as $item) {
            if (strpos($item->metadata->name, "k8s-php-test") !== false) {
                $response[$item->status->podIP] = $item->status->podIP;
            }
        }
        ksort($response);
        return $response;
    }

    /**
     * @Route("/instances", name="instances")
     */
    public function instancesAction(Request $request)
    {
        return new JsonResponse(["instances" => $this->getInstances()]);
    }

    /**
     * @Route("/display", name="display")
     */
    public function displayAction(Request $request)
    {
        $response = $this->render('default/display.html.twig', ["ip" => $_SERVER["SERVER_ADDR"]]);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}
