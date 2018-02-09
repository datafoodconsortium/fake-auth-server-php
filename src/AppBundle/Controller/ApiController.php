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
}
