<?php

namespace App\Controller;
use App\Entity\Product;
use App\Entity\ProductsRating;
use App\Entity\Question;
use App\Entity\Rating;
use App\Repository\ProductsRatingRepository;
use App\Repository\QuestionRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     * @param ProductRepository $repository
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ProductsRatingRepository $repos,
                          ProductRepository $repository,
                          Request $request)
    {
        //je dois calculer la moyenne des votes pour chaque produit
        $AvgForeahProduct = $repos->AvgForeahProduct();
        $CountRating=  $repos->findAll();
        return $this->render('products/index.html.twig', [
            'AvgForeahProduct'=>$AvgForeahProduct  ,
            'CountRating'=>$CountRating,
        ]);
    }
    /**
     * @Route("/products/{id}", name="infoproduct")
     */
    public function show( ProductRepository
    $repository, $id, Request $request ,Product $product)
    {
        return $this->render('products/uniqueproduct.html.twig', [
            'produit' => $repository->find($id),
        ]);
    }

    /**
     * @Route("/starsSave/{id}", name="starsSave" ,methods={"POST"})
     */
    public function starsSave($id,Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        if(!$request->isXmlHttpRequest()){
            throw new HttpException(400,'the header "X-Requested-With" is missing.');
        }
        $starValue = \json_decode($request->getContent(), true);
        /** @var Product $Product*/
        $entityManager = $this->getDoctrine()->getManager();
        $ProductsRating = new ProductsRating();
        $ProductsRating->setCreated(new DateTime(date('Y-m-d H:00:00')));
        $ProductsRating->setProduct($entityManager->getRepository(Product::class)->findOneById($id));
        $ProductsRating->setRating($entityManager->getRepository(Rating::class)->findOneBy(['notes' => $starValue]));
        $ProductsRating->setUsers($this->getUser());
        $entityManager->persist($ProductsRating);
        $entityManager->flush();
       /* $this->addFlash("success","Votre vote a été bien enregistré");*/
        return $this->json([
         /*  'starValue' =>$starValue,*/
        ]);
    }
}
