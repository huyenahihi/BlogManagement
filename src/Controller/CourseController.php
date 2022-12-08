<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    #[Route('/insertCourse', name: 'insert_course')]
    public function insertCourse(): Response
    {
        return $this->render('course/insert_course.html.twig');
    
    }
    #[Route('/viewCourse', name: 'view_course')]
    public function viewCourse(): Response
    {
        return $this->render('course/view_course.html.twig');
    
    }
}
