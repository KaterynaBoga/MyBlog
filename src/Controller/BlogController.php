<?php
// src/Controller/BlogController.php
namespace App\Controller;

use App\Entity\Commentary;
use App\Entity\Post;
use App\Form\CommentType;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function listBlog()
    {
        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findBy([], ['postedAt' => 'DESC']);

        return $this->render('blog/list.html.twig', ['posts' => $posts]);
    }

    /**
     * @Route("/post/{id}", name="post_show")
     */
    public function show(Post $post, Request $request, EntityManagerInterface $em)

    {
        $commentary = new Commentary();
        $commentary->setPost($post);
        $form = $this->createForm(CommentType::class, $commentary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($commentary);
            $em->flush();

            return $this->redirectToRoute('post_show', ['id' => $post->getId()]);
        }


        return $this->render('post/show.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }

    /**
     * @Route("/create", name="create_post")
     *
     * @param Request $request
     */
    public
    function create(Request $request, EntityManagerInterface $em)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('post_show', ['id' => $post->getId()]);
        }

        return $this->render('blog/form.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit_post")
     *
     * @param Request $request
     */
    public
    function editPost(Post $post, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('post_show', ['id' => $post->getId()]);
        }

        return $this->render('blog/edit.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);

    }

}