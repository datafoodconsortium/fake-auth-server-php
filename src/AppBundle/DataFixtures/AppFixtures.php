<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Client;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use OAuth2\OAuth2;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUser($manager, 'myriam', 'test');
        $this->loadUser($manager, 'benoit', 'test');
        $this->loadUser($manager, 'nicolas', 'test');

        $this->loadClient(
            $manager,
            $id = '38sng3yrrd4ww0kogsk8kc0sc0wkg44sg88wcggc8sk8ggw88c',
            $secret = '35orpg1kwegwcws8g4ogcogsks4c8ws4w8s80so80s0koc0w8w',
            'Data Food Consortium Prototype',
            'http://datafoodconsortium.org/',
            'https://avatars1.githubusercontent.com/u/24959977?s=200&v=4',
            array(
                OAuth2::GRANT_TYPE_IMPLICIT,
            ),
            array(
                'http://localhost:1234/redirect',
            )
        );
    }

    private function loadUser(ObjectManager $manager, $username, $password)
    {
        $user = new User($username);

        $hashedPassword = $this->encoder->encodePassword($user, $password);
        $user->setPassword($hashedPassword);

        $manager->persist($user);
        $manager->flush();
    }

    private function loadClient(ObjectManager $manager, $id, $secret, $name, $homepageUrl, $imageUrl, $grantTypes, $redirectUris)
    {
        $client = new Client();

        $client->setRandomId($id);
        $client->setSecret($secret);
        $client->setDetails($name, $homepageUrl, $imageUrl);
        $client->setAllowedGrantTypes($grantTypes);
        $client->setRedirectUris($redirectUris);

        $manager->persist($client);
        $manager->flush();
    }
}
