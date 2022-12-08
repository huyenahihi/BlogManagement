<?php

namespace App\Controller;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;


class BlogController extends AbstractController
{
    #[Route('/index', name: 'admin_index')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }


    #[Route('/addPost', name: 'insert_post')]
    public function add(Request $request, SluggerInterface $slugger, ManagerRegistry $managerRegistry)
    {
        // $post = new Post;
        // $form = $this->createForm(PostType::class, $post);
        // $form->handleRequest($request);
        // if ($form->isSubmitted() && $form->isValid()) {
        //     $img = $form->get('image')->getData();
        //     if ($img) {
        //         $originalImg = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
        //         // this is needed to safely include the file name as part of the URL
        //         $safeImg = $slugger->slug($originalImg);
        //         $newImg = $safeImg.'-'.uniqid().'.'.$img->guessExtension();

        //         // Move the file to the directory where brochures are stored
        //         try {
        //             $img->move(
        //                 $this->getParameter('postimage'),
        //                 $newImg
        //             );
        //         } catch (FileException $e) {
        //             // ... handle exception if something happens during file upload
        //         }

        //         // updates the 'brochureFilename' property to store the PDF file name
        //         // instead of its contents
        //         $post->setImage($newImg);

        //     }
        //     $manager = $managerRegistry->getManager();
        //     $manager->persist($post);
        //     $manager->flush();
        //     $this->addFlash('Success', 'Add succeed !');
        //     return $this->redirectToRoute('view_post');
        // }
        return $this->render('blog/insert_post.html.twig', [
            // 'postForm' => $form,
        ]);
    }

    #[Route('/viewPost', name: 'view_post')]
    public function ViewPost(
        // PostRepository $postRepository
        ): Response
    {
        // $post = $postRepository->findAll();
        return $this->render('blog/view_post.html.twig', [
            // 'posts' => $post,
        ]);
    }


    // #[Route('/delete/{id}', name: 'post_delete')]
    // public function deletePost($id, PostRepository $postRepository, ManagerRegistry $managerRegistry)
    // {
    //     $post = $postRepository->find($id);
    //     if ($post == null) {
    //         $this->addFlash('Error', 'Post not found !');
    //     } else {
    //         $manager = $managerRegistry->getManager();
    //         $manager->remove($post);
    //         $manager->flush();
    //         $this->addFlash('Success', 'Post oject has been chanced !');
    //     }
    //     return $this->redirectToRoute('view_post');
    // }


    // #[Route('/asc', name: 'sort_post_name_asc')]
    // public function sortNameAsc(PostRepository $postRepository)
    // {
    //     $post = $postRepository->sortBlogNameAsc();
    //     return $this->render(
    //         'WebAdmin/blog/view_post.html.twig',
    //         [
    //             'posts' => $post
    //         ]
    //     );
    // }


    // #[Route('/desc', name: 'sort_post_name_desc')]
    // public function sortNameDesc(PostRepository $postRepository)
    // {
    //     $post = $postRepository->sortpostNameDesc();
    //     return $this->render(
    //         'WebAdmin/blog/view_post.html.twig',
    //         [
    //             'posts' => $post
    //         ]
    //     );
    // }

    // #[Route('/search', name: 'search_post')]
    // public function searchPost(Request $request, PostRepository $postRepository)
    // {
    //     $title = $request->get('keyword');
    //     $post = $postRepository->searchPost($title);
    //     if ($post == null) {
    //         $this->addFlash('Error', 'Post not found !');
    //     }
    //     else{
    //         $this->addFlash('Success', 'Post oject has been chanced !');
    //     }
    //     return $this->render(
    //         'WebAdmin/blog/view_post.html.twig',
    //         [
    //             'posts' => $post
    //         ]
    //     );
    // }

}
