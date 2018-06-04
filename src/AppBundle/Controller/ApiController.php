<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    /**
     * @Route("/api/me", name="api_me")
     */
    public function meAction(Request $request)
    {
        $user = $this->getUser();

        return new JsonResponse([
            'username' => $user->getUsername(),
        ]);
    }

    /**
     * @Route("/api/catalog", name="api_catalog")
     */
    public function catalogAction(Request $request)
    {
        return new JsonResponse([
            'username' => $this->getUser()->getUsername(),
            'products' => [
                [
                    'type' => 'Tomate',
                    'nature' => 'Tomate coeur de boeuf',
                    'quantity' => rand(10, 30),
                ],
                [
                    'type' => 'Tomate',
                    'nature' => 'Tomate marmande',
                    'quantity' => rand(5, 15),
                ],
                [
                    'type' => 'Miel',
                    'nature' => 'Miel de thym',
                    'quantity' => rand(5, 15),
                ]
            ],
        ]);
    }
}
