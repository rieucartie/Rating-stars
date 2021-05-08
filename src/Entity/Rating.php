<?php

namespace App\Entity;

use App\Repository\RatingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RatingRepository::class)
 */
class Rating
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $notes;

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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
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


}
