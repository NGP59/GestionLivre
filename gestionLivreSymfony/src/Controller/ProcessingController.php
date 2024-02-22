<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProcessingController extends AbstractController
{
    #[Route('/processing', name: 'app_processing')]
    public function index(Request $request): Response
    {

        $user = new User();

        $form = $this->createForm(User::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
        }

        return $this->render('processing/index.html.twig', [
            'controller_name' => 'ProcessingController',
        ]);
    }
}
