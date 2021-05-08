<?php


namespace App\Repository;

use App\Entity\ProductsRating;
use App\Entity\Rating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductsRatingRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductsRating::class);
    }
    public function AvgForeahProduct()
    {
        //select avg groupby Id
        return $this->createQueryBuilder('p')
            ->select('p as product,AVG(r.notes) as avgRating ')
            ->leftJoin ('p.rating', 'r')
            ->leftJoin ('p.product', 'pr')
            ->addSelect('pr')
            ->leftJoin ('p.users', 'u')
            ->addSelect('u')
            ->addSelect('count(r.notes)')
            //->where('p.users is not null')
            ->groupBy('pr')
            ->orderBy('avgRating','ASC')
            ->getQuery()
            ->getArrayResult();
    }
}