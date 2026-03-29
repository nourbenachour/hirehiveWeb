<?php

namespace App\Controller\Nour;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('')]
class CandidatController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('candidat/home.html.twig', [
            'userName' => 'Jean Dupont',
            'courseCount' => 5,
            'badgeCount' => 12,
            'certCount' => 3,
            'progressLabels' => ['Cours 1', 'Cours 2', 'Cours 3', 'Cours 4'],
            'progressData' => [85, 70, 90, 60],
        ]);
    }
}
