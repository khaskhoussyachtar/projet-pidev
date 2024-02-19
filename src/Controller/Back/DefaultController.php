<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/back')]
class DefaultController extends AbstractController
{
    #[Route('/', name: 'back_homepage')]
    public function index(): Response
    {
        return $this->render('back/index.html.twig');
    }
}
