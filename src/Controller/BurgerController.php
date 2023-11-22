<?php

namespace App\Controller;

use App\Repository\BurgerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BurgerController extends AbstractController
{
    /* private $burgers = [
        [
            'id'=> 1,
            'name' => 'Le classique',
            'description' => 'Steak haché, tomate, salade, oignon, cornichon, sauce maison',
            'price' => 8.50,
        ],
        [
            'id'=> 2,
            'name' => 'Le bacon',
            'description' => 'Steak haché, bacon, tomate, salade, oignon, cornichon, sauce maison',
            'price' => 9.50,
        ],
        [
            'id'=> 3,
            'name' => 'Le chèvre miel',
            'description' => 'Steak haché, chèvre, miel, tomate, salade, oignon, cornichon, sauce maison',
            'price' => 10.50,
        ],
        [
            'id'=> 4,
            'name' => 'Le végétarien',
            'description' => 'Steak de soja, tomate, salade, oignon, cornichon, sauce maison',
            'price' => 8.50,
        ],
        [
            'id'=> 5,
            'name' => 'Le poulet',
            'description' => 'Escalope de poulet, tomate, salade, oignon, cornichon, sauce maison',
            'price' => 8.50,
        ],
        [
            'id'=> 6,
            'name' => 'Le fish',
            'description' => 'Poisson pané, tomate, salade, oignon, cornichon, sauce maison',
            'price' => 8.50,
        ],
    ]; */

    #[Route('/burger-list', name: 'app_burger_list')]
    public function list(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();

        return $this->render('burger/list.html.twig', [
            'burgers' => $burgers,
        ]);
    }
}
