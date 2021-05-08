<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; 
/** 
* @ORM\Entity(repositoryClass="App\Repository\UserRepository") 
* @UniqueEntity( 
* fields={"email"}, 
* message="L'émail que vous avez tapé est déjà utilisé !" 
* ) 
*/ 

class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
     /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;
    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];
    /**
    * @ORM\Column(type="string", length=255)
    */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=ProductsRating::class, mappedBy="users")
     */
    private $productsRatings;

    public function __construct()
    {
        $this->productsRatings = new ArrayCollection();
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
     /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
       public function __toString()
    {
        return $this->email ;
    }

    /**
     * @return ArrayCollection
     */
    public function getProductsRatings(): ArrayCollection
    {
        return $this->productsRatings;
    }

    /**
     * @param ArrayCollection $productsRatings
     */
    public function setProductsRatings(ArrayCollection $productsRatings): void
    {
        $this->productsRatings = $productsRatings;
    }



}
