<?php

namespace App\Controller;

use App\Repository\InstrumentalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/instru", name="instru_")
 */

class InstrumentalController extends AbstractController
{
    /**
     * @Route("/show", name="show")
     * @param InstrumentalRepository $instrumentalRepository
     * @return Response
     */

    public function show(InstrumentalRepository $instrumentalRepository) : Response
    {
        $instrus = $instrumentalRepository->findAll();

        return $this->render('instrumental/instrumentals.html.twig', [
            'instrus' => $instrus,
        ]);
    }
}
