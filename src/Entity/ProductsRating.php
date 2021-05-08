<?php


namespace App\Entity;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRatingRepository::class)
 * @ORM\Table(name="products_rating",
     uniqueConstraints={
     @ORM\UniqueConstraint(name="user_poll_unique", columns={"product_id","users_id"})
    }
)
 */

class ProductsRating
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rating", inversedBy="ProductsRating")
     * @ORM\JoinColumn(name="rating_id", referencedColumnName="id",nullable=false)
     */
    private $rating;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="ProductsRating")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id",nullable=false)
     */
    private $product;

    /**
     * @var datetime $created
     *
     * @ORM\Column(name="created", type="datetime",nullable = true)
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="productsRatings")
     * @ORM\JoinColumn(nullable=true)
     */
    private $users;

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
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product): void
    {
        $this->product = $product;
    }

    /**
     * @return datetime
     */
    public function getCreated(): datetime
    {
        return $this->created;
    }

    /**
     * @param datetime $created
     */
    public function setCreated(datetime $created): void
    {
        $this->created = $created;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }


}