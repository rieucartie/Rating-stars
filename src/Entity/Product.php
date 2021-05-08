<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductsRating", mappedBy="rating", cascade={"persist"})
     */
    private $ProductsRating;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProductsRating()
    {
        return $this->ProductsRating;
    }
    /**
     * @param mixed $ProductsRating
     */
    public function setProductsRating($ProductsRating): void
    {
        $this->ProductsRating = $ProductsRating;
    }
    public function __toString()
    {
        return $this->name;
    }

    public function getAvgRating()
    {

    }
}



