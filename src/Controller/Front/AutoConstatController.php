<?php

namespace App\Controller\Front;

use App\Entity\Constat;
use App\Form\Constat1Type;
use App\Repository\ConstatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/auto/constat')]
class AutoConstatController extends AbstractController
{
    #[Route('/', name: 'app_auto_constat_index', methods: ['GET'])]
    public function index(ConstatRepository $constatRepository): Response
    {
        return $this->render('front/auto_constat/index.html.twig', [
            'constats' => $constatRepository->findAll(),
        ]);
    }

   #[Route('/addconstat', name: 'add_constat', methods: ['GET', 'POST'])]
public function addconstat(EntityManagerInterface $entityManager, Request $request): Response
{
    $constat = new Constat();
    $form = $this->createForm(Constat1Type::class, $constat);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($constat);
        $entityManager->flush();

        return $this->redirectToRoute('app_auto_constat_index');
    }

    return $this->render('front/auto_constat/new.html.twig', [
        'constat' => $constat,
        'form' => $form->createView(),
    ]);
}


    #[Route('/showconstat/{id}', name: 'showconstat', methods: ['GET'])]
    public function showconstat(Constat $constat): Response
    {
        return $this->render('front/auto_constat/show.html.twig', [
            'constat' => $constat,
        ]);
    }

    #[Route('/editconstat/{id}', name: 'editconstat', methods: ['GET', 'POST'])]
    public function editconstat(Request $request, Constat $constat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Constat1Type::class, $constat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($constat); // Ajout de cette ligne
            $entityManager->flush();

            return $this->redirectToRoute('app_auto_constat_index');
        }

        return $this->render('front/auto_constat/edit.html.twig', [
            'form' => $form->createView(),
            'constat'=> $constat
        ]);
    }


}
