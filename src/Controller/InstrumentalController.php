<?php

namespace App\Controller;

use App\Entity\Instrumental;
use App\Form\InstrumentalType;
use App\Repository\InstrumentalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstrumentalController extends AbstractController
{
    /**
     * @Route("/instrumental", name="instru_list")
     * @param InstrumentalRepository $instrumentalRepository
     * @return Response
     */

    public function list(InstrumentalRepository $instrumentalRepository) : Response
    {
        $instrus = $instrumentalRepository->findAll();

        return $this->render('instrumental/instrumentals.html.twig', [
            'instrus' => $instrus,
        ]);
    }
    /**
     * @Route("/admin/instrumental", name="instrumental_index", methods={"GET"})
     * @param InstrumentalRepository $instrumentalRepository
     * @return Response
     */
    public function index(InstrumentalRepository $instrumentalRepository): Response
    {
        return $this->render('instrumental/index.html.twig', [
            'instrumentals' => $instrumentalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/instrumental/new", name="instrumental_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $instrumental = new Instrumental();
        $form = $this->createForm(InstrumentalType::class, $instrumental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($instrumental);
            $entityManager->flush();

            return $this->redirectToRoute('instrumental_index');
        }

        return $this->render('instrumental/new.html.twig', [
            'instrumental' => $instrumental,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/instrumental/{id}", name="instrumental_show", methods={"GET"})
     * @param Instrumental $instrumental
     * @return Response
     */
    public function show(Instrumental $instrumental): Response
    {
        return $this->render('instrumental/show.html.twig', [
            'instrumental' => $instrumental,
        ]);
    }

    /**
     * @Route("/admin/instrumental/{id}/edit", name="instrumental_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Instrumental $instrumental
     * @return Response
     */
    public function edit(Request $request, Instrumental $instrumental): Response
    {
        $form = $this->createForm(InstrumentalType::class, $instrumental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('instrumental_index');
        }

        return $this->render('instrumental/edit.html.twig', [
            'instrumental' => $instrumental,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/instrumental/{id}", name="instrumental_delete", methods={"DELETE"})
     * @param Request $request
     * @param Instrumental $instrumental
     * @return Response
     */
    public function delete(Request $request, Instrumental $instrumental): Response
    {
        if ($this->isCsrfTokenValid('delete'.$instrumental->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($instrumental);
            $entityManager->flush();
        }

        return $this->redirectToRoute('instrumental_index');
    }
}
