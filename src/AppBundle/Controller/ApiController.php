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
            'products' => [
                [
                    'type' => 'Tomate',
                    'nature' => 'Tomate coeur de boeuf',
                    'quantity' => 20,
                ],
                [
                    'type' => 'Tomate',
                    'nature' => 'Tomate marmande',
                    'quantity' => 10,
                ],
                [
                    'type' => 'Miel',
                    'nature' => 'Miel de thym',
                    'quantity' => 10,
                ]
            ],
        ]);
    }
}
