<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $hashedPassword;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $salt;

    public function __construct($username)
    {
        $this->email = $username;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->hashedPassword;
    }

    public function setPassword($hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
        // noop
    }

    public function serialize()
    {
        return serialize(
            array(
                $this->id,
                $this->email,
                $this->hashedPassword,
            )
        );
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->email,
            $this->hashedPassword,
        ) = unserialize($serialized);
    }
}
