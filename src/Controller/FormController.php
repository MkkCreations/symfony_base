<?php

namespace App\Controller;

use App\Entity\Burger;
use App\Entity\Image;
use App\Form\BurgerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form', methods: ['GET', 'POST'])]
    public function creation(Request $request, EntityManagerInterface $em): Response
    {
        $burger = new Burger();
        $form = $this->createForm(BurgerType::class, $burger);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($burger);
            $em->flush();
    
            $this->addFlash('success', 'Burger créé!');
            return $this->redirectToRoute('app_burger_list');
        }
    
        return $this->render('form/index.html.twig', [
            'burger' => $burger,
            'form' => $form->createView()
        ]);
    }
}
