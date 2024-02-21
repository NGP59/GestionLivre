<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateController extends AbstractController
{
    #[Route('/create', name: 'app_create')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {

        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ) {
        $em->persist($book);
        $em->flush();

        return $this->redirectToRoute('app_home');
        }
        return $this->render('create/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
