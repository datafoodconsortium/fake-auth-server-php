<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/redirect", name="redirect")
     */
    public function redirectAction(Request $request)
    {
        return $this->render('default/redirect.html.twig', [
            'code' => $request->query->get('code'),
            'error' => $request->query->get('error_description'),
        ]);
    }

    private function getClientWithAuthorizationCodeFlow()
    {
        return $this->getDoctrine()->getManager()->getRepository(Client::class)->find(1);
    }
}
