<?php

namespace App\DataFixtures;

use App\Entity\Cities;
use App\Entity\Contracts;
use App\Entity\Jobs;
use App\Entity\Companies;
use App\Entity\JobAnnouncements;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        foreach(["Paris","Lyon","Lille","Marseille","Dijon"] as $name){
            $city = new Cities();
            $city->setCityName($name);
            $manager->persist($city);
        }
        foreach(["CDI","CDD","Alternance","Stage","Freelance","Temps partiel"] as $contractname){
            $contract = new Contracts();
            $contract->setContractName($contractname);
            $manager->persist($contract);
        }
        foreach(["Agricole", "Commerciale", "Médicale", "Artisanale", "Commerce"] as $jobname){
            $job = new Jobs();
            $job->setJobName($jobname);
            $manager->persist($job);
        }
        foreach(["SubSkill", "Selency", "Withings"] as $companyname){
            $company = new Companies();
            $company->setCompanyName($companyname);
            $manager->persist($company);
        }
        

        $manager->flush();

        $citiesRepository = $manager->getRepository(Cities::class);
        $cities = $citiesRepository->findAll();

        $contractsRepository = $manager->getRepository(Contracts::class);
        $contracts = $contractsRepository->findAll();

        $jobsRepository = $manager->getRepository(Jobs::class);
        $jobs = $jobsRepository->findAll();

        $companiesRepository = $manager->getRepository(Companies::class);
        $companies = $companiesRepository->findAll();

        for ($i=1; $i<=50;$i++){
            $randKeyCities = rand(0, count($cities) -1);
            $randKeyContracts = rand(0, count($contracts) -1);
            $randKeyJobs = rand(0, count($jobs) -1);
            $randKeyCompanies = rand(0, count($companies) -1);

            $jobAnnouncement = new JobAnnouncements();
            $jobAnnouncement->setPublishDate(new \DateTime('01/09/2023'));
            $jobAnnouncement->setLastUpdateDate(new \DateTime('01/09/2023'));
            $jobAnnouncement->setAnnouncementsTitle("Announcements Title");
            $jobAnnouncement->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ");

            $jobAnnouncement->setCity($cities[$randKeyCities]);
            $jobAnnouncement->setContract($contracts[$randKeyContracts]);
            $jobAnnouncement->setJob($jobs[$randKeyJobs]);
            $jobAnnouncement->setCompany($companies[$randKeyCompanies]);

            $manager->persist($jobAnnouncement);


        }
        $manager->flush();
    }
}
