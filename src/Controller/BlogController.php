<?php
// src/Controller/BlogController.php
namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/", name="blog_list")
     */
    public function listBlog()
    {
        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findBy(
                [],
                ['postedAt' => 'DESC']
            );


        return $this->render('blog/list.html.twig', ['posts' => $posts]);
    }

    /**
     * @Route("/post/{id}", name="post_show")
     */
    public function show(Post $post)
    {
        return $this->render('post/show.html.twig', ['post' => $post]);
    }

    /**
     * @Route("/create", name="create_post")
     *
     * @param Request $request
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($post);
            $em->flush();
            $this->addFlash('info', 'Изменен пост');


            return $this->redirectToRoute('post_show', ['id' => $post->getId()]);

        }

        return $this->render('blog/form.html.twig', [
            'form' => $form->createView(),
        ]);


    }

}