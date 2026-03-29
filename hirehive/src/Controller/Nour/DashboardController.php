<?php

namespace App\Controller\Nour;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        $user = $this->getUser();
        if ($user === null) {
            return $this->redirectToRoute('app_login');
        }

        return $this->redirectToRoute('app_frontoffice_home');
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('backoffice/index.html.twig', [
            'total_claims' => 156,
            'open_claims' => 42,
            'urgent_claims' => 8,
            'resolved_claims' => 106,
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('backoffice/index.html.twig', [
            'total_claims' => 156,
            'open_claims' => 42,
            'urgent_claims' => 8,
            'resolved_claims' => 106,
        ]);
    }
}
