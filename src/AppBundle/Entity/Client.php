<?php

namespace AppBundle\Entity;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Client extends BaseClient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $homepageUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $imageUrl;

    public function getName()
    {
        return $this->name;
    }

    public function getHomepageUrl()
    {
        return $this->homepageUrl;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function setDetails($name, $homepageUrl, $imageUrl)
    {
        $this->name = $name;
        $this->homepageUrl = $homepageUrl;
        $this->imageUrl = $imageUrl;
    }
}
