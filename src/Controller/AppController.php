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


        $filter = [];

        #Convert name to id
        if ($jobName) {
            $job = $jobsRepository->findByName($jobName);
            $filter['Job'] = $job;
        }

        if ($contractName) {
            $contract = $contractsRepository->findByName($contractName);
            $filter['Contract'] = $contract;
        }

        if ($cityName) {
            $city = $citiesRepository->findByName($cityName);
            $filter['City'] = $city;
        }

        $perPage = 10;

        $jobAnnouncements = $jobAnnouncementsRepository->findBy($filter, [], $perPage, ($pageNumber-1)*10);
        $totalJobAnnouncements = $jobAnnouncementsRepository->count($filter);
        $maxPage = ceil($totalJobAnnouncements / $perPage);
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
