<?php

namespace App\Controller;

use App\Repository\JobAnnouncementsRepository;
use App\Repository\JobsRepository;
use App\Repository\ContractsRepository;
use App\Repository\CitiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(
    JobAnnouncementsRepository $jobAnnouncementsRepository,
    JobsRepository $jobsRepository,
    ContractsRepository $contractsRepository,
    CitiesRepository $citiesRepository,
    Request $request,
    ): Response
    {
        #get parameters in url
        $pageNumber = $request->query->getInt('pages', 1);
        $jobName = $request->query->get('job');
        $contractName = $request->query->get('contract');
        $cityName = $request->query->get('city');

        #Convert name to id
        if ($jobName) {
            $job = $jobsRepository->findByName($jobName);
            $job = $job->getId();
        }
        if ($contractName) {
            $contract = $contractsRepository->findByName($contractName);
            $contract = $contract->getId();
        }
        if ($cityName) {
            $city = $citiesRepository->findByName($cityName);
            $city = $city->getId();
        }


        $perPage = 10;
        $totalJobAnnouncements = $jobAnnouncementsRepository->count([]);
        $maxPage = ceil($totalJobAnnouncements / $perPage);

        $jobAnnouncements = $jobAnnouncementsRepository->findBy([], [], $perPage, ($pageNumber-1)*10);
        return $this->render('app/index.html.twig', [
            'jobAnnouncements' =>  $jobAnnouncements,
            'pages' => $pageNumber,
            'maxPage' => $maxPage,
            'jobsData' => $jobsRepository->findAll(),
            'contractsData' => $contractsRepository->findAll(),
            'citiesData' => $citiesRepository->findAll(),

        ]);

    }
}
