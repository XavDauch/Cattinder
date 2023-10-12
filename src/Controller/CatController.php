<?php

namespace App\Controller;

use App\Repository\CatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatController extends AbstractController
{
    #[Route('/cats', name: 'app_cats')]
    public function index(
        CatRepository $catRepository
    ): Response
    {
        return $this->render('cat/index.html.twig', [
            'cats' => $catRepository->findAll(),
        ]);
    }
    #[Route('/cats/{id<\d+>}', name: 'app_cats_show')]
    public function show(
        int $id,
        CatRepository $catRepository
    ): Response
        {
        $cat = $catRepository->find($id);
        if (!$cat) {
            throw $this->createNotFoundException('cat not found');
        }   
        return $this->render('cat/show.html.twig', [
            'cat' => $cat,
        ]);
    }
}
