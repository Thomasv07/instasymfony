<?php

namespace App\Controller;

use App\Entity\TagsPost;
use App\Form\TagsPostType;
use App\Repository\TagsPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tags/post")
 */
class TagsPostController extends AbstractController
{
    /**
     * @Route("/", name="tags_post_index", methods={"GET"})
     */
    public function index(TagsPostRepository $tagsPostRepository): Response
    {
        return $this->render('tags_post/index.html.twig', [
            'tags_posts' => $tagsPostRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tags_post_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tagsPost = new TagsPost();
        $form = $this->createForm(TagsPostType::class, $tagsPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tagsPost);
            $entityManager->flush();

            return $this->redirectToRoute('tags_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tags_post/new.html.twig', [
            'tags_post' => $tagsPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="tags_post_show", methods={"GET"})
     */
    public function show(TagsPost $tagsPost): Response
    {
        return $this->render('tags_post/show.html.twig', [
            'tags_post' => $tagsPost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tags_post_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TagsPost $tagsPost): Response
    {
        $form = $this->createForm(TagsPostType::class, $tagsPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tags_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tags_post/edit.html.twig', [
            'tags_post' => $tagsPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="tags_post_delete", methods={"POST"})
     */
    public function delete(Request $request, TagsPost $tagsPost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tagsPost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tagsPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tags_post_index', [], Response::HTTP_SEE_OTHER);
    }
}
