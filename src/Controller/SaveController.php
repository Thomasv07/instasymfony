<?php

namespace App\Controller;

use App\Entity\Save;
use App\Form\SaveType;
use App\Repository\SaveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/save")
 */
class SaveController extends AbstractController
{
    /**
     * @Route("/", name="save_index", methods={"GET"})
     */
    public function index(SaveRepository $saveRepository): Response
    {
        return $this->render('save/index.html.twig', [
            'saves' => $saveRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="save_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $save = new Save();
        $form = $this->createForm(SaveType::class, $save);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($save);
            $entityManager->flush();

            return $this->redirectToRoute('save_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('save/new.html.twig', [
            'save' => $save,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="save_show", methods={"GET"})
     */
    public function show(Save $save): Response
    {
        return $this->render('save/show.html.twig', [
            'save' => $save,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="save_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Save $save): Response
    {
        $form = $this->createForm(SaveType::class, $save);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('save_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('save/edit.html.twig', [
            'save' => $save,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="save_delete", methods={"POST"})
     */
    public function delete(Request $request, Save $save): Response
    {
        if ($this->isCsrfTokenValid('delete'.$save->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($save);
            $entityManager->flush();
        }

        return $this->redirectToRoute('save_index', [], Response::HTTP_SEE_OTHER);
    }
}
