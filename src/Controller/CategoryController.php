<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/insertCategory', name: 'insert_category')]
    public function insertCategory(): Response
    {
        return $this->render('category/insert_category.html.twig');
    
    }
    #[Route('/viewCategory', name: 'view_category')]
    public function viewCategory(): Response
    {
        return $this->render('category/view_category.html.twig');
    
    }

}