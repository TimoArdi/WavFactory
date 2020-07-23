<?php

namespace App\Controller;

use App\Entity\Online;
use App\Form\OnlineType;
use App\Repository\OnlineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/online")
 */
class OnlineController extends AbstractController
{
    /**
     * @Route("/list", name="online_list", methods={"GET"})
     * @param OnlineRepository $onlineRepository
     * @return Response
     */
    public function list(OnlineRepository $onlineRepository): Response
    {
        $titres = $onlineRepository->findAll();
        return $this->render('online/list.html.twig', [
            'titres' => $titres,
        ]);
    }

    /**
     * @Route("/", name="online_index", methods={"GET"})
     * @param OnlineRepository $onlineRepository
     * @return Response
     */
    public function index(OnlineRepository $onlineRepository): Response
    {
        return $this->render('online/index.html.twig', [
            'onlines' => $onlineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="online_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $online = new Online();
        $form = $this->createForm(OnlineType::class, $online);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($online);
            $entityManager->flush();

            return $this->redirectToRoute('online_index');
        }

        return $this->render('online/new.html.twig', [
            'online' => $online,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="online_show", methods={"GET"})
     * @param Online $online
     * @return Response
     */
    public function show(Online $online): Response
    {
        return $this->render('online/show.html.twig', [
            'online' => $online,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="online_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Online $online
     * @return Response
     */
    public function edit(Request $request, Online $online): Response
    {
        $form = $this->createForm(OnlineType::class, $online);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('online_index');
        }

        return $this->render('online/edit.html.twig', [
            'online' => $online,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="online_delete", methods={"DELETE"})
     * @param Request $request
     * @param Online $online
     * @return Response
     */
    public function delete(Request $request, Online $online): Response
    {
        if ($this->isCsrfTokenValid('delete'.$online->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($online);
            $entityManager->flush();
        }

        return $this->redirectToRoute('online_index');
    }
}
