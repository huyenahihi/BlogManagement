<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PodcastController extends AbstractController
{
    #[Route('/insertpodcast', name: 'insert_podcast')]
    public function insertPodcast(): Response
    {
        return $this->render('podcast/insert_podcast.html.twig', [
            'controller_name' => 'PodcastController',
        ]);
    }
    #[Route('/viewpodcast', name: 'view_podcast')]
    public function viewPodcast(): Response
    {
        return $this->render('podcast/view_podcast.html.twig', [
            'controller_name' => 'PodcastController',
        ]);
    }
}
