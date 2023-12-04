<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController 
{
    #[Route('/category/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): response
    {
        $categories = $categoryRepository->findAll();
        return $this->render(
            'category/index.html.twig', 
            ['categories' => $categories]
        );
    }

    #[Route('/category/{categoryId}', name: 'category_show')]
    public function show(string $categoryId, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
        $categories = $categoryRepository->findOneBy(['id' => $categoryId]);
        if (!$categories)
        {
            throw $this->createNotFoundException(
                'No program with id : found in program\'s table.'
            );
        }
        
        $programs = $programRepository->findBy(['category' => $categories->getId()], ['id' => 'DESC'], 3);
        if (!$programs)
        {
            throw $this->createNotFoundException(
                'No program with id : found in program\'s table.'
            );
        }

        return $this->render('category/show.html.twig', [
            'programs' => $programs,
            'categories' => $categories,
        ]);
    }


}