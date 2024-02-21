<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DetailBookController extends AbstractController
{
    #[Route('/detail/book/{id}', name: 'app_detail_book')]
    public function index($id, BookRepository $br): Response
    {
        $book = $br->findOneBy(['id'=> $id]);
        return $this->render('detail_book/index.html.twig', [
            'book' => $book,
        ]);
    }
}
