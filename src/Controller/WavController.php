<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WavController extends AbstractController
{
    /**
     * @Route("/index", name="wav_index")
     */
    public function index(): Response
    {
        return $this->render('wav/index.html.twig', [
            'website' => 'Wav Factory',
        ]);
    }

    /**
     * @Route("/admin", name="admin_dash")
     */
    public function admin(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }
}
