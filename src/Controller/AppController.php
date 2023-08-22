<?php

namespace App\Controller;

use App\Repository\JobAnnouncementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(JobAnnouncementsRepository $jobAnnouncements,Request $request): Response
    {
        $pageNumber = $request->query->getInt('pages', 1);
        $perPage = 10;
        $totalJobAnnouncements = $jobAnnouncements->count([]);
        $maxPage = ceil($totalJobAnnouncements / $perPage);

        $jobAnnouncements = $jobAnnouncements->findBy([], [], $perPage, ($pageNumber-1)*10);
        return $this->render('app/index.html.twig', [
            'jobAnnouncements' =>  $jobAnnouncements,
            'pages' => $pageNumber,
            'maxPage' => $maxPage,
        ]);
    }
}
